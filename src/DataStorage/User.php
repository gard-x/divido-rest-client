<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 11:26
 */

namespace DividoServiceClient\DataStorage;

use DividoServiceClient\Exception\ApiReplyExcetion;

class User extends DataStorage
{
    /** @var string */
    public $token;

    /** @var string */
    public $userId;

    /** @var string */
    public $created;

    /** @var string */
    public $expire;

    /** @var bool */
    public $loggedOut;

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
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return User
     */
    public function setToken(string $token): User
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return User
     */
    public function setUserId(string $userId): User
    {
        $this->userId = $userId;
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
     * @return User
     */
    public function setCreated(string $created): User
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpire(): string
    {
        return $this->expire;
    }

    /**
     * @param string $expire
     * @return User
     */
    public function setExpire(string $expire): User
    {
        $this->expire = $expire;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLoggedOut(): bool
    {
        return $this->loggedOut;
    }

    /**
     * @param bool $loggedOut
     * @return User
     */
    public function setLoggedOut(bool $loggedOut): User
    {
        $this->loggedOut = $loggedOut;
        return $this;
    }




}