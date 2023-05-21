<?php

namespace Homeandriy\Ithillel\Factory\Classes\Abstract;


use Homeandriy\Ithillel\Factory\Interfaces\Car;

abstract class TaxiFactory
{
    abstract public function callTransport(): Car;

    public function getCarInformation(float $clearPrice): string
    {
        $car = $this->callTransport();
        return 'Please, expect a ' . $car->getColor() . ' ' . $car->getModel() . ' car. The cost of your trip is ' . $car->getPrice($clearPrice) . ' UAH.';
    }
}