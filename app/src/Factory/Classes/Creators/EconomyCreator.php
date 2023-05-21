<?php

namespace Homeandriy\Ithillel\Factory\Classes\Creators;

use Homeandriy\Ithillel\Factory\Interfaces\Car;
use Homeandriy\Ithillel\Factory\Classes\Transport\Economy;

class EconomyCreator extends TaxiFactory
{
    public function callTransport(): Car
    {
        return new Economy();
    }
}