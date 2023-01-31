<?php
/**
 * Created by PhpStorm.
 * User: 林育成
 * Date: 2023/1/17
 * Time: 15:59
 */

namespace EasyswooleYc\ReadWriteSubTable\Writing;

class BaseWriting
{
    protected static $subClass;
    /**
     * @param array $data
     * @throws
     * @return bool
     */
    public static function execInsert($data)
    {
        $res = true;
        foreach (static::$subClass as $className) {
            /** @var SubClass $class */
            $class = new $className();
            $tmpRes = $class->execInsert($data);
            $res = $res && $tmpRes;
        }
        return $res;
    }
    public static function execUpdate($data, $condition)
    {
        $res = true;
        foreach (static::$subClass as $className) {
            /** @var SubClass $class */
            $class = new $className();
            $tmpRes = $class->execUpdate($data, $condition);
            $res = $res && $tmpRes;
        }
        return $res;
    }
}