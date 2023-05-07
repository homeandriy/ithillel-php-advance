<?php
// Homework 4

use Homeandriy\Ithillel\Services\User;

try {
    $userInstance = new User();
    $userInstance->setName('Ighor');

    echo $userInstance->getAll();
    echo '<br>';

    $userInstance->setAge(25);
    echo $userInstance->getAll();

    echo '<br>';

    echo '<h2>Magic to string</h2>';
    echo $userInstance;

    echo '<br>';

    // Error Age must be a number and be greater than zero
    // $userInstance->setAge('Hello');

    // Error Age must be a number and be greater than zero
    // $userInstance->setAge(0);

    //Age must be a number and be greater than zero
    //$userInstance->setAge(-20);

    //Method: setemail not found!
     $userInstance->setemail('admin@ithillel.ua');

    // Method: getEmail not found!
    // $userInstance->getEmail();

    // Calling magic static methods is prohibited for Homeandriy\Ithillel\Services\User class
    // User::setName(__FILE__);

} catch (Exception $exception) {
    echo '<pre><h2 style="color: orangered">';
    echo "The request throws an error: \n" . $exception->getMessage(
        ) . "\nCall stack: \n" . $exception->getTraceAsString();
    echo '</h2><pre>';
}
