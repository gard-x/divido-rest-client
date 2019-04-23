<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 3:31 PM
 */

namespace DividoServiceClient\DataStorage;


use DividoServiceClient\Exception\ApiReplyExcetion;
use DividoServiceClient\DataStorage\CreditRequestProduct;

class CreditRequest extends DataStorage
{
    /** @var string */
    public $finance;
    /** @var float */
    public $deposit;
    /** @var float */
    public $amount;
    /** @var string */
    public $reference;
    /** @var CreditRequestCustommer */
    public $customer;
    /** @var CreditRequestMetadata */
    public $metadata;
    /** @var CreditRequestProduct[] */
    public $products = array();
    /** @var string */
    public $checkoutUrl;
    /** @var string */
    public $redirectUrl;

    public function __construct()
    {
        $this->customer = new CreditRequestCustommer();
        $this->metadata = new CreditRequestMetadata();

    }

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
    public function getFinance(): string
    {
        return $this->finance;
    }

    /**
     * @param string $finance
     * @return CreditRequest
     */
    public function setFinance(string $finance): CreditRequest
    {
        $this->finance = $finance;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeposit(): float
    {
        return $this->deposit;
    }

    /**
     * @param float $deposit
     * @return CreditRequest
     */
    public function setDeposit(float $deposit): CreditRequest
    {
        $this->deposit = $deposit;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return CreditRequest
     */
    public function setAmount(float $amount): CreditRequest
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return CreditRequest
     */
    public function setReference(string $reference): CreditRequest
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return CreditRequestCustommer
     */
    public function getCustomer(): CreditRequestCustommer
    {
        return $this->customer;
    }

    /**
     * @param CreditRequestCustommer $customer
     * @return CreditRequest
     */
    public function setCustomer(CreditRequestCustommer $customer): CreditRequest
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return CreditRequestMetadata
     */
    public function getMetadata(): CreditRequestMetadata
    {
        return $this->metadata;
    }

    /**
     * @param CreditRequestMetadata $metadata
     * @return CreditRequest
     */
    public function setMetadata(CreditRequestMetadata $metadata): CreditRequest
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @return CreditRequestProduct[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param CreditRequestProduct[] $products
     * @return CreditRequest
     */
    public function setProducts(array $products): CreditRequest
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return string
     */
    public function getCheckoutUrl(): string
    {
        return $this->checkoutUrl;
    }

    /**
     * @param string $checkoutUrl
     * @return CreditRequest
     */
    public function setCheckoutUrl(string $checkoutUrl): CreditRequest
    {
        $this->checkoutUrl = $checkoutUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     * @return CreditRequest
     */
    public function setRedirectUrl(string $redirectUrl): CreditRequest
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }


    public function createRequest()
    {

        $return = [
            "finance" => $this->finance,
            "deposit" => $this->deposit,
            "amount" => $this->amount,
            "reference" => $this->reference,
            "customer" => [
                "title" => $this->customer->title,
                "first_name" => $this->customer->firstName,
                "middle_name" => $this->customer->middleName,
                "last_name" => $this->customer->lastName,
                "email" => $this->customer->email,
                "mobileNumber" => $this->customer->mobileNumber,
                "phoneNumber" => $this->customer->phoneNumber,
                "postcode" => $this->customer->postcode,
                "country" => $this->customer->country
            ],
            "metadata" => [
                "orderNumber" => $this->metadata->orderNumber,
                "checksum" => $this->metadata->getChecksum()
            ],
            "products" => [

            ],
            "checkout_url" => $this->checkoutUrl,
            "redirect_url" => $this->redirectUrl
        ];
        foreach ($this->products as $product) {
            $return['products'][] = ["type" => $product->type,
                "text" => $product->text,
                "quantity" => $product->quantity,
                "value" => $product->value];
        }
        return $return;
    }

}


