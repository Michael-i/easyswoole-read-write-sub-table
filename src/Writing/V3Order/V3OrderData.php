<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/17
 * Time: 14:45
 */

namespace EasyswooleYc\ReadWriteSubTable\Writing\V3Order;

use App\Common\DoubleWriting\SubClass;
use App\DAO\V3Order\V3OrderDataDao;

class V3OrderData extends SubClass
{
    /**
     * 子表ActiveRecord类名
     */
    public function getSubModel(){
        return V3OrderDataDao::class;
    }

    /**
     * 同步字段规则
     * @param array $data
     * @return array
     */
    public function syncFields($data)
    {
        return [
            'order_id' => $data['order_id'] ?? null,
            'order_data' => $data['order_data'] ?? null,
        ];
    }
}