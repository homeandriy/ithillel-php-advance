<?php

use Homeandriy\Ithillel\Services\Format\WithDateFormat;
use Homeandriy\Ithillel\Services\Format\RawFormat;
use Homeandriy\Ithillel\Services\Format\WithDateAndDetailsFormat;
use Homeandriy\Ithillel\Services\Delivery\ConsoleDelivery;
use Homeandriy\Ithillel\Services\Delivery\EmailDelivery;
use Homeandriy\Ithillel\Services\Delivery\SMSDelivery;
use Homeandriy\Ithillel\Services\Logger\Logger;

$withDateFormatString          = new WithDateFormat();
$rawFormatString               = new RawFormat();
$withDateAndDetailFormatString = new WithDateAndDetailsFormat();

$emailDelivery   = new EmailDelivery();
$consoleDelivery = new ConsoleDelivery();
$smsDelivery     = new SMSDelivery();

$loggerInstance2 = new Logger($rawFormatString, $emailDelivery);
$loggerInstance2->log('Emergency error! Please fix me!');

$loggerInstance1 = new Logger($withDateFormatString, $emailDelivery);
$loggerInstance1->log('Emergency error! Please fix me!');

$loggerInstance3 = new Logger($withDateAndDetailFormatString, $emailDelivery);
$loggerInstance3->log('Emergency error! Please fix me!');

echo '----------------------------------------------------<br>';

$loggerInstance5 = new Logger($rawFormatString, $consoleDelivery);
$loggerInstance5->log('Emergency error! Please fix me!');

$loggerInstance4 = new Logger($withDateFormatString, $consoleDelivery);
$loggerInstance4->log('Emergency error! Please fix me!');

$withDateAndDetailFormatString->setDetails('Added some detail - With some details');
$loggerInstance6 = new Logger($withDateAndDetailFormatString, $consoleDelivery);
$loggerInstance6->log('Emergency error! Please fix me!');

echo '----------------------------------------------------<br>';
$loggerInstance8 = new Logger($rawFormatString, $smsDelivery);
$loggerInstance8->log('Emergency error! Please fix me!');

$loggerInstance7 = new Logger($withDateFormatString, $smsDelivery);
$loggerInstance7->log('Emergency error! Please fix me!');

$withDateAndDetailFormatString->setDetails('Added second some detail - With some details');

$loggerInstance9 = new Logger($withDateAndDetailFormatString, $smsDelivery);
$loggerInstance9->log('Emergency error! Please fix me!');

