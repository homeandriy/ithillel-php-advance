<?php

use Homeandriy\Ithillel\Controller\Controller;
use Homeandriy\Ithillel\Service\Database\MySQL;
use Homeandriy\Ithillel\Service\Database\PgSQL;

require 'vendor/autoload.php';

try {
    $controller = new Controller(new MySQL());
    echo 'MySQL Data: <br>';
    d($controller->getData());

    $controllerPg = new Controller(new PgSQL());

    echo 'PostgreSQL Data: <br>';
    d($controllerPg->getData());
} catch (Exception $exception) {
    echo $exception->getMessage() . '<br>' . $exception->getTraceAsString();
}