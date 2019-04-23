<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 1:49 PM
 */

namespace DividoServiceClient\DataStorage;


class DealInstalments extends DataStorage
{

    /** @var int */
    public $month;
    /** @var string */
    public $date;
    /** @var float */
    public $startingBalance;
    /** @var float */
    public $presentValue;
    /** @var float */
    public $interestAccrued;
    /** @var float */
    public $setupFee;
    /** @var float */
    public $instalmentFee;
    /** @var float */
    public $instalment;
    /** @var float */
    public $totalPayable;
    /** @var float */
    public $end_balance;

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
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return DealInstalments
     */
    public function setMonth(int $month): DealInstalments
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return DealInstalments
     */
    public function setDate(string $date): DealInstalments
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getStartingBalance(): float
    {
        return $this->startingBalance;
    }

    /**
     * @param float $startingBalance
     * @return DealInstalments
     */
    public function setStartingBalance(float $startingBalance): DealInstalments
    {
        $this->startingBalance = $startingBalance;
        return $this;
    }

    /**
     * @return float
     */
    public function getPresentValue(): float
    {
        return $this->presentValue;
    }

    /**
     * @param float $presentValue
     * @return DealInstalments
     */
    public function setPresentValue(float $presentValue): DealInstalments
    {
        $this->presentValue = $presentValue;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestAccrued(): float
    {
        return $this->interestAccrued;
    }

    /**
     * @param float $interestAccrued
     * @return DealInstalments
     */
    public function setInterestAccrued(float $interestAccrued): DealInstalments
    {
        $this->interestAccrued = $interestAccrued;
        return $this;
    }

    /**
     * @return float
     */
    public function getSetupFee(): float
    {
        return $this->setupFee;
    }

    /**
     * @param float $setupFee
     * @return DealInstalments
     */
    public function setSetupFee(float $setupFee): DealInstalments
    {
        $this->setupFee = $setupFee;
        return $this;
    }

    /**
     * @return float
     */
    public function getInstalmentFee(): float
    {
        return $this->instalmentFee;
    }

    /**
     * @param float $instalmentFee
     * @return DealInstalments
     */
    public function setInstalmentFee(float $instalmentFee): DealInstalments
    {
        $this->instalmentFee = $instalmentFee;
        return $this;
    }

    /**
     * @return float
     */
    public function getInstalment(): float
    {
        return $this->instalment;
    }

    /**
     * @param float $instalment
     * @return DealInstalments
     */
    public function setInstalment(float $instalment): DealInstalments
    {
        $this->instalment = $instalment;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPayable(): float
    {
        return $this->totalPayable;
    }

    /**
     * @param float $totalPayable
     * @return DealInstalments
     */
    public function setTotalPayable(float $totalPayable): DealInstalments
    {
        $this->totalPayable = $totalPayable;
        return $this;
    }

    /**
     * @return float
     */
    public function getEndBalance(): float
    {
        return $this->end_balance;
    }

    /**
     * @param float $end_balance
     * @return DealInstalments
     */
    public function setEndBalance(float $end_balance): DealInstalments
    {
        $this->end_balance = $end_balance;
        return $this;
    }

}