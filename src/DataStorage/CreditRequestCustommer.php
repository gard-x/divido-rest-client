<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 3:34 PM
 */

namespace DividoServiceClient\DataStorage;


use DividoServiceClient\Exception\ApiReplyExcetion;

class CreditRequestCustommer extends DataStorage
{

    /** @var string */
    public $title;
    /** @var string */
    public $firstName;
    /** @var string */
    public $middleName;
    /** @var string */
    public $lastName;
    /** @var string */
    public $email;
    /** @var string */
    public $mobileNumber;
    /** @var string */
    public $phoneNumber;
    /** @var string */
    public $postcode;
    /** @var string */
    public $country;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return CreditRequestCustommer
     */
    public function setTitle(string $title): CreditRequestCustommer
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return CreditRequestCustommer
     */
    public function setFirstName(string $firstName): CreditRequestCustommer
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     * @return CreditRequestCustommer
     */
    public function setMiddleName(string $middleName): CreditRequestCustommer
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return CreditRequestCustommer
     */
    public function setLastName(string $lastName): CreditRequestCustommer
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return CreditRequestCustommer
     */
    public function setEmail(string $email): CreditRequestCustommer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     * @return CreditRequestCustommer
     */
    public function setMobileNumber(string $mobileNumber): CreditRequestCustommer
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return CreditRequestCustommer
     */
    public function setPhoneNumber(string $phoneNumber): CreditRequestCustommer
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     * @return CreditRequestCustommer
     */
    public function setPostcode(string $postcode): CreditRequestCustommer
    {
        $this->postcode = $postcode;
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
     * @return CreditRequestCustommer
     */
    public function setCountry(string $country): CreditRequestCustommer
    {
        $this->country = $country;
        return $this;
    }


}