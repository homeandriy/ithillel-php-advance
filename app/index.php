<?php

use Homeandriy\Ithillel\Common\DB;
use Homeandriy\Ithillel\Utils\Faker;

require 'vendor/autoload.php';

try {
    require_once 'rgb.php';
    //Homework 1
    //    $connect = new DB('db', 'ithillel_db', 'pguser', 'supersecret'); // TODO move to env and clean constructor

    // Fill table faker data
    //Faker::fillProductTable($connect, 100);

    //Trigger Error
    //throw new DomainException('Some other Error');

//    $connect->query('SELECT * FROM "Products"', []);
//
//    dd($connect->getResult());

} catch (Exception $exception) {
    dd($exception->getMessage(), $exception->getTraceAsString());
}
