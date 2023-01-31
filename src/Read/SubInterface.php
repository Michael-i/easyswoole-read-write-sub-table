<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2023/1/6
 * Time: 16:36
 */

namespace EasyswooleYc\ReadWriteSubTable\Read;

use EasySwoole\ORM\AbstractModel;

interface SubInterface
{
    /**
     * 主表关联键
     * @return string
     */
    public function mainRelationKey();
    /**
     * 子表关联键
     * @return string
     */
    public function subRelationKey();
    /**
     * 分表字段
     * @return array
     */
    public static function getSelect();
    /**
     * 子表ActiveRecord类名
     * @return AbstractModel
     */
    public function subModel();

    public function scalar($mainRelationId, $fields);
    public function avg($mainRelationIds, $fields);
    public function sum($mainRelationIds, $fields);
    public function min($mainRelationIds, $fields);
    public function max($mainRelationIds, $fields);
    public function column($mainRelationIds, $fields);
    public function all(&$list, $fields);
    public function get(&$data, $fields);
}