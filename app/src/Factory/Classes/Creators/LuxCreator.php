<?php

namespace Homeandriy\Ithillel\Factory\Classes\Creators;

use Homeandriy\Ithillel\Factory\Classes\Abstract\TaxiFactory;
use Homeandriy\Ithillel\Factory\Interfaces\Car;
use Homeandriy\Ithillel\Factory\Classes\Transport\Lux;

class LuxCreator extends TaxiFactory
{

    public function callTransport(): Car
    {
        return new Lux();
    }
}