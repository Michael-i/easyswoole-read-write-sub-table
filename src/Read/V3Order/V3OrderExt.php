<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/5
 * Time: 16:11
 */

namespace EasyswooleYc\ReadWriteSubTable\Read\V3Order;

use App\Common\VerticalSubTable\SubClass;
use App\DAO\V3Order\V3OrderExtDao;

class V3OrderExt extends SubClass
{
    /**
     * 主表关联键
     * @return string
     */
    public function mainRelationKey()
    {
        return 'order_id';
    }
    /**
     * 子表关联键
     * @return string
     */
    public function subRelationKey()
    {
        return 'order_id';
    }
    /**
     * 子表ActiveRecord类名
     */
    public function subModel(){
        return V3OrderExtDao::class;
    }

    /**
     * 分表字段
     * @return array
     */
    public static function getSelect()
    {
        return [
            "address", "name"
        ];
    }
}