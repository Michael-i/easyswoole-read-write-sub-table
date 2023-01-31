<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/5
 * Time: 16:11
 */

namespace EasyswooleYc\ReadWriteSubTable\Read\V3Order;

use App\Common\VerticalSubTable\SubClass;
use App\DAO\V3Order\V3OrderDataDao;
use App\DAO\V3Order\V3OrderExtDao;

class V3OrderData extends SubClass
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
        return V3OrderDataDao::class;
    }

    /**
     * 分表字段
     * @return array
     */
    public static function getSelect()
    {
        return [
            "order_data"
        ];
    }
}