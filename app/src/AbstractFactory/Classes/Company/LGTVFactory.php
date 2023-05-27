<?php

namespace Homeandriy\Ithillel\AbstractFactory\Classes\Company;

use Homeandriy\Ithillel\AbstractFactory\Classes\TV\LgLcdTV;
use Homeandriy\Ithillel\AbstractFactory\Classes\TV\LgLedTV;
use Homeandriy\Ithillel\AbstractFactory\Interface\CompanyFactory;
use Homeandriy\Ithillel\AbstractFactory\Interface\TV;

class LGTVFactory implements CompanyFactory
{

    public function makeLedTV(int $numberOfLEDs = 100): TV
    {
        return new LgLedTV($numberOfLEDs);
    }

    public function makeLCDTV(): TV
    {
        return new LgLcdTV();
    }
}