<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 1:36 PM
 */

namespace DividoServiceClient\DataStorage;


class DealAmounts extends DataStorage
{

    /** @var float */
    public $purchaseAmount;
    /** @var float */
    public $depositAmount;
    /** @var float */
    public $creditAmount;
    /** @var float */
    public $monthlyPaymentAmount;
    /** @var float */
    public $creditCostAmount;
    /** @var float */
    public $totalRepayableAmount;

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
    public function getPurchaseAmount(): float
    {
        return $this->purchaseAmount;
    }

    /**
     * @param float $purchaseAmount
     * @return DealAmounts
     */
    public function setPurchaseAmount(float $purchaseAmount): DealAmounts
    {
        $this->purchaseAmount = $purchaseAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getDepositAmount(): float
    {
        return $this->depositAmount;
    }

    /**
     * @param float $depositAmount
     * @return DealAmounts
     */
    public function setDepositAmount(float $depositAmount): DealAmounts
    {
        $this->depositAmount = $depositAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getCreditAmount(): float
    {
        return $this->creditAmount;
    }

    /**
     * @param float $creditAmount
     * @return DealAmounts
     */
    public function setCreditAmount(float $creditAmount): DealAmounts
    {
        $this->creditAmount = $creditAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getMonthlyPaymentAmount(): float
    {
        return $this->monthlyPaymentAmount;
    }

    /**
     * @param float $monthlyPaymentAmount
     * @return DealAmounts
     */
    public function setMonthlyPaymentAmount(float $monthlyPaymentAmount): DealAmounts
    {
        $this->monthlyPaymentAmount = $monthlyPaymentAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getCreditCostAmount(): float
    {
        return $this->creditCostAmount;
    }

    /**
     * @param float $creditCostAmount
     * @return DealAmounts
     */
    public function setCreditCostAmount(float $creditCostAmount): DealAmounts
    {
        $this->creditCostAmount = $creditCostAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalRepayableAmount(): float
    {
        return $this->totalRepayableAmount;
    }

    /**
     * @param float $totalRepayableAmount
     * @return DealAmounts
     */
    public function setTotalRepayableAmount(float $totalRepayableAmount): DealAmounts
    {
        $this->totalRepayableAmount = $totalRepayableAmount;
        return $this;
    }


}