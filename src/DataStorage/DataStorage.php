<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 8:36
 */

namespace DividoServiceClient\DataStorage;


use DividoServiceClient\Exception\ApiReplyExcetion;
use DividoServiceClient\Service\Utils;

class DataStorage
{
    protected static $classReflection = array();

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value)
    {

        return $this->{"set" . ucfirst(Utils::camelize($name))}($value);
    }

    /**
     * @param array $array
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        $entity = new static();

        $reflection=$entity::getReflection();
        foreach ($reflection as $name) {

            $key=(isset($array[$name])?$name:Utils::decamelize($name));

            $entity->__set($name, $array[$key]);
            unset($array[$key]);
        }
        if (!empty($array)) {
            throw new ApiReplyExcetion("Unprocessed Data:" . json_encode($array));
        }

        return $entity;
    }

    /**
     * @return array()
     * @throws \ReflectionException
     */
    public static function getReflection()
    {
        if (!isset(static::$classReflection[static::class])) {
            $reflect = new \ReflectionClass(static::class);
            $fields=$reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
            $fieldNames=array();
            foreach ($fields as $field)
            {
                $fieldNames[]=$field->getName();
            }
            static::$classReflection[static::class]=$fieldNames;
        }
        return static::$classReflection[static::class];
    }

    public static function checkField($fieldName)
    {
        if (in_array($fieldName, static::getReflection())) {
            return true;
        }
        return false;
    }


}