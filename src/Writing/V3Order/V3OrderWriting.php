<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/17
 * Time: 14:40
 */

namespace EasyswooleYc\ReadWriteSubTable\Writing\V3Order;

use EasyswooleYc\ReadWriteSubTable\Writing\BaseWriting;

class V3OrderWriting extends BaseWriting
{
    protected static $subClass = [
        V3OrderExt::class
    ];
}