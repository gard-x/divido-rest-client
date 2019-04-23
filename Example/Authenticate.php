<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 9:54 AM
 */

session_start();

class Authenticate
{
    static function saveUser(\DividoServiceClient\DataStorage\User $user)
    {
        return $_SESSION['user']=$user;
    }

    static function clearUser()
    {
        unset($_SESSION['user']);
    }

    /**
     * @return \DividoServiceClient\DataStorage\User|null
     */
    static function getUser()
    {
        if (isset($_SESSION['user'])) return $_SESSION['user'];
        return null;
    }

    static function isLogged()
    {
       return isset($_SESSION['user']);
    }

}