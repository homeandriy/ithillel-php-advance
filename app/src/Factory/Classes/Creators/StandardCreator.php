<?php

namespace Homeandriy\Ithillel\Factory\Classes\Creators;

use Homeandriy\Ithillel\Factory\Interfaces\Car;
use Homeandriy\Ithillel\Factory\Classes\Transport\Standard;

class StandardCreator extends TaxiFactory
{

    public function callTransport(): Car
    {
        return new Standard();
    }
}