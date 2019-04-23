<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 25.02.2019
 * Time: 14:07
 */

namespace DividoServiceClient\Service;


class Utils
{

    static function decamelize($string)
    {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }

    static function camelize($string)
    {
        return strtr(ucwords($string, "_"), array("_" => ""));
    }

}