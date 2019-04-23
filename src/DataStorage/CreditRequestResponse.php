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

class CreditRequestResponse extends DataStorage
{

    const STATUS_PROPOSAL = "PROPOSAL"; // Proposal send to Underwriter, waiting for decision
    const STATUS_ACCEPTED = "ACCEPTED"; // Application accepted by Underwriter
    const STATUS_DECLINED = "DECLINED"; // Applicaiton declined by Underwriter
    const STATUS_REFERRED = "REFERRED"; // Application referred by Underwriter, waiting for new status
    const STATUS_INFO_NEEDED = "INFO-NEEDED"; //More information is required before decision
    const STATUS_ACTION_CUSTOMER = "ACTION-CUSTOMER"; // Waiting for more information from Customer
    const STATUS_ACTION_RETAILER = "ACTION-RETAILER"; // Waiting for more information from Merchant
    const STATUS_ACTION_LENDER = "ACTION-LENDER"; // Waiting for more information from Underwriter
    const STATUS_DEPOSIT_PAID = "DEPOSIT-PAID";  // Deposit paid by customer
    const STATUS_SIGNED = "SIGNED"; // Customer has signed all contracts
    const STATUS_READY = "READY"; //Order is ready to be dispatched
    const STATUS_AWAITING_ACTIVATION = "AWAITING-ACTIVATION"; // Waiting for confirmation from Underwriter
    const STATUS_AWAITING_CANCELLATION = "AWAITING-CANCELLATION"; // Waiting for confirmation from Underwriter
    const STATUS_PARTIALLY_ACTIVATED = "PARTIALLY-ACTIVATED"; // Application partially activated by merchant
    const STATUS_ACTIVATED = "ACTIVATED"; // Application activated and confirmed by Underwriter
    const STATUS_CANCELLED = "CANCELLED"; // Application cancelled
    const STATUS_REFUNDED = "REFUNDED"; // Whole Application refunded
    const STATUS_COMPLETED = "COMPLETED"; // Application completed (after cool down period)

    const POSSIBLE_CANCEL = array(
        self::STATUS_PROPOSAL,
        self::STATUS_REFERRED,
        self::STATUS_INFO_NEEDED,
        self::STATUS_ACTION_CUSTOMER,
        self::STATUS_ACTION_RETAILER,
        self::STATUS_ACTION_LENDER,
        self::STATUS_ACCEPTED,
        self::STATUS_DEPOSIT_PAID,
        self::STATUS_PARTIALLY_ACTIVATED,
        self::STATUS_SIGNED,
        self::STATUS_READY
    );

    const POSSIBLE_ACTIVATION =
        [
            self::STATUS_READY
        ];
    const POSSIBLE_REFUND =
        [
            self::STATUS_AWAITING_ACTIVATION,
            self::STATUS_PARTIALLY_ACTIVATED,
            self::STATUS_ACTIVATED,
            self::STATUS_COMPLETED
        ];


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
    /** @var string */
    public $userId;
    /** @var string */
    public $country;
    /** @var string */
    public $language;
    /** @var string */
    public $currency;
    /** @var string */
    public $responseUrl;
    /** @var string */
    public $applicationId;
    /** @var string */
    public $applicationToken;
    /** @var string */
    public $applicationUrl;
    /** @var string */
    public $created;
    /** @var string */
    public $status;


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
     * @return CreditRequestResponse
     */
    public function setFinance(string $finance): CreditRequestResponse
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
     * @return CreditRequestResponse
     */
    public function setDeposit(float $deposit): CreditRequestResponse
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
    public function setAmount(float $amount): CreditRequestResponse
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
     * @return CreditRequestResponse
     */
    public function setReference(string $reference): CreditRequestResponse
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
     * @param CreditRequestCustommer|array $customer
     * @return CreditRequestResponse
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setCustomer($customer): CreditRequestResponse
    {
        $customer = CreditRequestCustommer::__fromArray($customer);
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
     * @param CreditRequestMetadata|array $metadata
     * @return CreditRequestResponse
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setMetadata($metadata): CreditRequestResponse
    {
        $metadata = CreditRequestMetadata::__fromArray($metadata);
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
     * @param CreditRequestProduct[]|null $products
     * @return CreditRequestResponse
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setProducts(?array $products): CreditRequestResponse
    {
        if (is_null($products)) $products = array();
        foreach ($products as $key => $product) {
            if (is_array($product)) $products[$key] = CreditRequestProduct::__fromArray($product);
        }

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
     * @return CreditRequestResponse
     */
    public function setCheckoutUrl(string $checkoutUrl): CreditRequestResponse
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
     * @return CreditRequestResponse
     */
    public function setRedirectUrl(string $redirectUrl): CreditRequestResponse
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return CreditRequestResponse
     */
    public function setUserId(?string $userId): CreditRequestResponse
    {
        $this->userId = $userId;
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
     * @return CreditRequestResponse
     */
    public function setCountry(string $country): CreditRequestResponse
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return CreditRequestResponse
     */
    public function setLanguage(string $language): CreditRequestResponse
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return CreditRequestResponse
     */
    public function setCurrency(string $currency): CreditRequestResponse
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    /**
     * @param string $responseUrl
     * @return CreditRequestResponse
     */
    public function setResponseUrl(string $responseUrl): CreditRequestResponse
    {
        $this->responseUrl = $responseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return CreditRequestResponse
     */
    public function setApplicationId(string $applicationId): CreditRequestResponse
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationToken(): string
    {
        return $this->applicationToken;
    }

    /**
     * @param string $applicationToken
     * @return CreditRequestResponse
     */
    public function setApplicationToken(string $applicationToken): CreditRequestResponse
    {
        $this->applicationToken = $applicationToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationUrl(): string
    {
        return $this->applicationUrl;
    }

    /**
     * @param string $applicationUrl
     * @return CreditRequestResponse
     */
    public function setApplicationUrl(string $applicationUrl): CreditRequestResponse
    {
        $this->applicationUrl = $applicationUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return CreditRequestResponse
     */
    public function setCreated(string $created): CreditRequestResponse
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return CreditRequestResponse
     */
    public function setStatus(?string $status): CreditRequestResponse
    {
        $this->status = $status;
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

    public function isCancelable()
    {
        return in_array($this->status, self::POSSIBLE_CANCEL);
    }

    public function isForActivation()
    {
        return in_array($this->status, self::POSSIBLE_ACTIVATION);
    }

    public function isForRefund()
    {
        return in_array($this->status, self::POSSIBLE_REFUND);
    }
}


