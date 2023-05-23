<?php

use Homeandriy\Ithillel\Common\ContractBuilder;
require 'vendor/autoload.php';


$contractBuilderInstance = new ContractBuilder();
$contractBuilderInstance->setEmail('question@examle.com')
    ->setAddress('Жашків')
    ->setName('Andrii')
    ->setSurname('Lesson')
    ->setPhone('+380 66 66 53 490')
    ->build();