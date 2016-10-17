<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 11/10/2016
 * Time: 20:09
 */

namespace Application\Util;


class Util
{
    public static function arrayObjectsToArray($arrObjects)
    {
        $return = array();
        foreach ($arrObjects as $object) {
            $return[] = $object->toArray();
        }
        return $return;
    }
}