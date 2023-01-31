<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/17
 * Time: 14:52
 */

namespace EasyswooleYc\ReadWriteSubTable\Writing;

use EasySwoole\ORM\AbstractModel;

Interface SubInterface
{
    /**
     * 子表模型
     * @return AbstractModel
     */
    public function getSubModel();
    /**
     * 同步对应字段
     * @param array $data 原表数据
     * @return array
     */
    public function syncFields($data);
}