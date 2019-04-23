<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 1:45 PM
 */

namespace DividoServiceClient\DataStorage;


class DealFees extends DataStorage
{

    /** @var float */
    public $instalmentFeeAmount;
    /** @var float */
    public $setupFeeAmount;

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
     * @return float
     */
    public function getInstalmentFeeAmount(): float
    {
        return $this->instalmentFeeAmount;
    }

    /**
     * @param float $instalmentFeeAmount
     * @return DealFees
     */
    public function setInstalmentFeeAmount(float $instalmentFeeAmount): DealFees
    {
        $this->instalmentFeeAmount = $instalmentFeeAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getSetupFeeAmount(): float
    {
        return $this->setupFeeAmount;
    }

    /**
     * @param float $setupFeeAmount
     * @return DealFees
     */
    public function setSetupFeeAmount(float $setupFeeAmount): DealFees
    {
        $this->setupFeeAmount = $setupFeeAmount;
        return $this;
    }


}