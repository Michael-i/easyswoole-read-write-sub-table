<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/17
 * Time: 14:52
 */

namespace EasyswooleYc\ReadWriteSubTable\Writing;

use EasySwoole\ORM\AbstractModel;

abstract class SubClass implements SubInterface
{
    /**
     * @param array $data 原表数据
     * @throws
     * @return bool
     */
    public function execInsert($data)
    {
        $subData = $this->getSubData($data);
        if (!$subData) {
            return false;
        }
        /** @var AbstractModel $subModel */
        $subModel = $this->getSubModel();
        return $subModel::create($subData)->save();
    }
    /**
     * @param array $data 更新数据
     * @param array $condition 更新条件
     * @throws
     * @return bool
     */
    public function execUpdate($data, $condition)
    {
        $subData = $this->getSubData($data);
        if (!$subData) {
            return false;
        }
        /** @var AbstractModel $subModel */
        $subModel = $this->getSubModel();
        return $subModel::create()->update($subData, $condition);
    }

    ################### 内部实现函数 ####################

    private function getSubData($data)
    {
        // 获取同步字段数据
        $subData = [];
        foreach ($this->syncFields($data) as $field => $value) {
            !is_null($value) && $subData[$field] = $value;
        }
        return $subData;
    }
}