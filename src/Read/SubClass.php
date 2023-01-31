<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/6
 * Time: 9:44
 */

namespace EasyswooleYc\ReadWriteSubTable\Read;

abstract class SubClass implements SubInterface
{
    /**
     * @param int $mainRelationId 关联主键ID
     * @param array|string $fields 查询字段
     * @throws
     * @return string|int
     */
    public function scalar($mainRelationId, $fields)
    {
        return $this->subModel()::create()
            ->field($fields)
            ->where([$this->mainRelationKey() => $mainRelationId])
            ->scalar();
    }

    /**
     * @param array $mainRelationIds 关联主键ID
     * @param string $fields 查询字段
     * @throws
     * @return null
     */
    public function avg($mainRelationIds, $fields)
    {
        return $this->subModel()::create()
            ->where([$this->mainRelationKey() => [$mainRelationIds, 'IN']])
            ->avg($fields);
    }
    /**
     * @param array $mainRelationIds 关联主键ID
     * @param string $fields 查询字段
     * @throws
     * @return null
     */
    public function sum($mainRelationIds, $fields)
    {
        return $this->subModel()::create()
            ->where([$this->mainRelationKey() => [$mainRelationIds, 'IN']])
            ->sum($fields);
    }
    /**
     * @param array $mainRelationIds 关联主键ID
     * @param string $fields 查询字段
     * @throws
     * @return null
     */
    public function min($mainRelationIds, $fields)
    {
        return $this->subModel()::create()
            ->where([$this->mainRelationKey() => [$mainRelationIds, 'IN']])
            ->min($fields);
    }
    /**
     * @param array $mainRelationIds 关联主键ID
     * @param string $fields 查询字段
     * @throws
     * @return null
     */
    public function max($mainRelationIds, $fields)
    {
        return $this->subModel()::create()
            ->where([$this->mainRelationKey() => [$mainRelationIds, 'IN']])
            ->max($fields);
    }
    /**
     * @param array $mainRelationIds 关联主键ID
     * @param string|array $fields 查询字段
     * @throws
     * @return null
     */
    public function column($mainRelationIds, $fields)
    {
        return $this->subModel()::create()
            ->field($fields)
            ->where([$this->mainRelationKey() => [$mainRelationIds, 'IN']])
            ->column();
    }
    /**
     * @param array $list 原数据列表
     * @param array $fields 查询字段
     * @throws
     * @return null
     */
    public function all(&$list, $fields)
    {
        $mainRelationKey = $this->mainRelationKey();
        $subRelationKey = $this->subRelationKey();
        $subFields = array_merge($fields, [$subRelationKey]);
        // 获取关联主表键值
        $relationIds = array_column($list, $mainRelationKey);
        // 查询子表数据
        $subDatas = $this->subModel()::create()
            ->field($subFields)
            ->where([$subRelationKey => [$relationIds, 'IN']])
            ->indexBy($subRelationKey);
        // 合并子表数据
        foreach ($list as $key => $data){
            $subData = isset($subDatas[$data[$mainRelationKey]]) ? $subDatas[$data[$mainRelationKey]] : [];
            $this->supplementData($list[$key], $subData, $fields);
        }
    }
    /**
     * @param array $data 原数据集合
     * @param array $fields 查询字段
     * @throws
     * @return null
     */
    public function get(&$data, $fields)
    {
        if (!$data) {
            return $data;
        }
        $mainRelationKey = $this->mainRelationKey();
        $subRelationKey = $this->subRelationKey();
        // 获取主表关联字段值
        $relationId = $data[$mainRelationKey];
        // 查询子表数据
        $subData = $this->subModel()::create()
            ->field($fields)
            ->where([$subRelationKey => $relationId])
            ->get();
        // 合并子表数据
        $this->supplementData($data, $subData, $fields);
    }
    private function supplementData(&$data, $subData, $select)
    {
        foreach ($select as $value){
            if (is_object($data)) {
                $data->$value = $subData[$value] ?? '';
            } else {
                $data[$value] = $subData[$value] ?? '';
            };
        }
        return $data;
    }
}