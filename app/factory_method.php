<?php

use Homeandriy\Ithillel\Factory\Classes\Creators\EconomyCreator;
use Homeandriy\Ithillel\Factory\Classes\Creators\LuxCreator;
use Homeandriy\Ithillel\Factory\Classes\Creators\StandardCreator;
use Homeandriy\Ithillel\Factory\Classes\Creators\TaxiFactory;
use Homeandriy\Ithillel\Factory\Classes\Transport\Economy;
use Homeandriy\Ithillel\Factory\Classes\Transport\Lux;
use Homeandriy\Ithillel\Factory\Classes\Transport\Standard;

function getCarInfo(TaxiFactory $factory, float $clearPrice = 250.33): string
{
    return $factory->getCarInformation($clearPrice);
}

function getTaxiFactory(string $type): TaxiFactory
{
    $factoriesElements = [
        Economy::TYPE => EconomyCreator::class,
        Standard::TYPE => StandardCreator::class,
        Lux::TYPE => LuxCreator::class,

    ];

    if (!array_key_exists($type, $factoriesElements)) {
        throw new Exception('Invalid car type');
    }

    return new $factoriesElements[$type]();
}

try {
    $transportFactoryEconomy = getTaxiFactory(Economy::TYPE);
    $transportFactoryStandard = getTaxiFactory(Standard::TYPE);
    $transportFactoryLux = getTaxiFactory(Lux::TYPE);

    d(getCarInfo($transportFactoryEconomy));
    d(getCarInfo($transportFactoryStandard));
    d(getCarInfo($transportFactoryLux));
} catch (Exception $exception) {
    echo $exception->getMessage() . " \n " . $exception->getTraceAsString();
}
