<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/16/2019
 * Time: 10:00 AM
 */
require_once __DIR__ . "/../vendor/autoload.php";

$constantsFile = __DIR__ . '/constants.php';

if (is_file($constantsFile)) {
    require_once $constantsFile   ;
}

require_once "Helper.php";
require_once "Authenticate.php";