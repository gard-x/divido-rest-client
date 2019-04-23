<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 1:27 PM
 */

namespace DividoServiceClient\DataStorage;


class Deal extends DataStorage
{

    /** @var float */
    public $interestRatePercentage;
    /** @var float */
    public $nominalInterestRatePercentage;

    /** @var float */
    public $CompoundedInterestRatePercentage;

    /** @var float */
    public $effectiveInterestRatePercentage;

    /** @var int */
    public $agreementDurationMonths;
    /** @var int */
    public $deferralPeriodMonths;

    /** @var DealAmounts */
    public $amounts;

    /** @var DealFees */
    public $fees;

    /** @var DealInstalments[] */
    public $instalments;

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
    public function getInterestRatePercentage(): float
    {
        return $this->interestRatePercentage;
    }

    /**
     * @param float $interestRatePercentage
     * @return Deal
     */
    public function setInterestRatePercentage(float $interestRatePercentage): Deal
    {
        $this->interestRatePercentage = $interestRatePercentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getNominalInterestRatePercentage(): float
    {
        return $this->nominalInterestRatePercentage;
    }

    /**
     * @param float $nominalInterestRatePercentage
     * @return Deal
     */
    public function setNominalInterestRatePercentage(float $nominalInterestRatePercentage): Deal
    {
        $this->nominalInterestRatePercentage = $nominalInterestRatePercentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getCompoundedInterestRatePercentage(): float
    {
        return $this->CompoundedInterestRatePercentage;
    }

    /**
     * @param float $CompoundedInterestRatePercentage
     * @return Deal
     */
    public function setCompoundedInterestRatePercentage(float $CompoundedInterestRatePercentage): Deal
    {
        $this->CompoundedInterestRatePercentage = $CompoundedInterestRatePercentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getEffectiveInterestRatePercentage(): float
    {
        return $this->effectiveInterestRatePercentage;
    }

    /**
     * @param float $effectiveInterestRatePercentage
     * @return Deal
     */
    public function setEffectiveInterestRatePercentage(float $effectiveInterestRatePercentage): Deal
    {
        $this->effectiveInterestRatePercentage = $effectiveInterestRatePercentage;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgreementDurationMonths(): int
    {
        return $this->agreementDurationMonths;
    }

    /**
     * @param int $agreementDurationMonths
     * @return Deal
     */
    public function setAgreementDurationMonths(int $agreementDurationMonths): Deal
    {
        $this->agreementDurationMonths = $agreementDurationMonths;
        return $this;
    }

    /**
     * @return DealAmounts
     */
    public function getAmounts(): DealAmounts
    {
        return $this->amounts;
    }

    /**
     * @param DealAmounts|Array $amounts
     * @return Deal
     */
    public function setAmounts( $amounts): Deal
    {
        if (is_array($amounts))
        {
            $amounts=DealAmounts::__fromArray($amounts);
        }
        $this->amounts = $amounts;
        return $this;
    }

    /**
     * @return DealFees
     */
    public function getFees(): DealFees
    {
        return $this->fees;
    }

    /**
     * @param DealFees|array $fees
     * @return Deal
     * @throws \ReflectionException
     */
    public function setFees( $fees): Deal
    {
        if (is_array($fees))
        {
            $fees=DealFees::__fromArray($fees);
        }
        $this->fees = $fees;
        return $this;
    }

    /**
     * @return DealInstalments[]
     */
    public function getInstalments(): array
    {
        return $this->instalments;
    }

    /**
     * @param DealInstalments[] $instalments
     * @return Deal
     */
    public function setInstalments(array $instalments): Deal
    {
        foreach ($instalments as $no=>$instalment)
        {
            if (is_array($instalment))
            {
                $instalments[$no]=DealInstalments::__fromArray($instalment);
            }
        }

        $this->instalments = $instalments;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeferralPeriodMonths(): int
    {
        return $this->deferralPeriodMonths;
    }

    /**
     * @param int $deferralPeriodMonths
     * @return Deal
     */
    public function setDeferralPeriodMonths(int $deferralPeriodMonths): Deal
    {
        $this->deferralPeriodMonths = $deferralPeriodMonths;
        return $this;
    }

}