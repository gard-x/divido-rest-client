<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 3:36 PM
 */

namespace DividoServiceClient\DataStorage;


use DividoServiceClient\Exception\ApiReplyExcetion;

class CreditRequestMetadata  extends DataStorage
{

    /** @var string */
    public $orderNumber;
    /** @var string */
    public $checksum;

    /**
     * @param array $array
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        /** @var static $return */
        $return = parent::__fromArray($array);
        return $return;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return CreditRequestMetadata
     */
    public function setOrderNumber(string $orderNumber): CreditRequestMetadata
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getChecksum(): string
    {
        return $this->checksum;
    }

    /**
     * @param string $checksum
     * @return CreditRequestMetadata
     */
    public function setChecksum(string $checksum): CreditRequestMetadata
    {
        $this->checksum = $checksum;
        return $this;
    }


}