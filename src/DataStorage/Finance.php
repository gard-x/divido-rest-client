<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 11:26
 */

namespace DividoServiceClient\DataStorage;

use DividoServiceClient\Exception\ApiReplyExcetion;

class Finance extends DataStorage
{
    /** @var string */
    public $id;
    /** @var string */
    public $country;
    /** @var string */
    public $text;
    /** @var float */
    public $interestRate;
    /** @var float */
    public $minAmount;
    /** @var float */
    public $minDeposit;
    /** @var float */
    public $maxDeposit;
    /** @var int */
    public $agreementDuration;
    /** @var float */
    public $setupFee;
    /** @var float */
    public $instalmentFee;
    /** @var int */
    public $deferralPeriod;
    /** @var string */
    public $calculation_family;
    /** @var string */
    public $lenderCode;


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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Finance
     */
    public function setId(string $id): Finance
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Finance
     */
    public function setCountry(string $country): Finance
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Finance
     */
    public function setText(string $text): Finance
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    /**
     * @param float $interestRate
     * @return Finance
     */
    public function setInterestRate(float $interestRate): Finance
    {
        $this->interestRate = $interestRate;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    /**
     * @param float $minAmount
     * @return Finance
     */
    public function setMinAmount(float $minAmount): Finance
    {
        $this->minAmount = $minAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinDeposit(): float
    {
        return $this->minDeposit;
    }

    /**
     * @param float $minDeposit
     * @return Finance
     */
    public function setMinDeposit(float $minDeposit): Finance
    {
        $this->minDeposit = $minDeposit;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxDeposit(): float
    {
        return $this->maxDeposit;
    }

    /**
     * @param float $maxDeposit
     * @return Finance
     */
    public function setMaxDeposit(float $maxDeposit): Finance
    {
        $this->maxDeposit = $maxDeposit;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgreementDuration(): int
    {
        return $this->agreementDuration;
    }

    /**
     * @param int $agreementDuration
     * @return Finance
     */
    public function setAgreementDuration(int $agreementDuration): Finance
    {
        $this->agreementDuration = $agreementDuration;
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
     * @return Finance
     */
    public function setSetupFee(float $setupFee): Finance
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
     * @return Finance
     */
    public function setInstalmentFee(float $instalmentFee): Finance
    {
        $this->instalmentFee = $instalmentFee;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeferralPeriod(): int
    {
        return $this->deferralPeriod;
    }

    /**
     * @param int $deferralPeriod
     * @return Finance
     */
    public function setDeferralPeriod(int $deferralPeriod): Finance
    {
        $this->deferralPeriod = $deferralPeriod;
        return $this;
    }

    /**
     * @return string
     */
    public function getCalculationFamily(): string
    {
        return $this->calculation_family;
    }

    /**
     * @param string $calculation_family
     * @return Finance
     */
    public function setCalculationFamily(string $calculation_family): Finance
    {
        $this->calculation_family = $calculation_family;
        return $this;
    }

    /**
     * @return string
     */
    public function getLenderCode(): string
    {
        return $this->lenderCode;
    }

    /**
     * @param string $lenderCode
     * @return Finance
     */
    public function setLenderCode(string $lenderCode): Finance
    {
        $this->lenderCode = $lenderCode;
        return $this;
    }



}