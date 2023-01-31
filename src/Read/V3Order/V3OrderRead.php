<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/5
 * Time: 14:38
 */
namespace EasyswooleYc\ReadWriteSubTable\Read\V3Order;

use App\Common\VerticalSubTable\VerticalSubQuery;

class V3OrderRead extends VerticalSubQuery
{
    protected static $mainTableName = 'v2_order';

    protected $subClass = [
        V3OrderData::class,
        V3OrderExt::class,
    ];
}