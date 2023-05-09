<?php

//require 'vendor/autoload.php';
use Homeandriy\Ithillel\Common\Transport;
use Homeandriy\Ithillel\Services\SenderService;
use Homeandriy\Ithillel\Utils\ClassLoader;

try {
    include_once 'src/Utils/ClassLoader.php';
    new ClassLoader(__DIR__);

    $senderService = new SenderService();
    var_dump(
        $senderService(new Transport([]))
    );
} catch (Exception $exception) {
    echo '<pre>';
    echo $exception->getMessage();
    echo '</pre>';
}
