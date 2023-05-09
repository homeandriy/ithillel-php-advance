<?php

use Homeandriy\Ithillel\Models\User;
use Homeandriy\Ithillel\Utils\InvalidPasswordException;
use Homeandriy\Ithillel\Utils\InvalidUserIdException;

try {
    $userInstance = new User(10, 'secret');
    d($userInstance);

    //  User id mus be integer
    // $userInstance1 = new User('test', 'secret');

    // User Password cannot be empty or longer than 8 characters
    $userInstance2 = new User(random_int(1, 1000), 'super_secret');
} catch (InvalidUserIdException $userIdException) {
    echo $userIdException->getMessage();
} catch (InvalidPasswordException $invalid_password_exception) {
    echo $invalid_password_exception->getMessage();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
//finally { // Some finally block
//    echo 'finally block';
//}