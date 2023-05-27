<?php
namespace Homeandriy\Ithillel\AbstractFactory\Classes\Company;
use Homeandriy\Ithillel\AbstractFactory\Classes\TV\SonyLcdTV;
use Homeandriy\Ithillel\AbstractFactory\Classes\TV\SonyLedTV;
use Homeandriy\Ithillel\AbstractFactory\Interface\CompanyFactory;
use Homeandriy\Ithillel\AbstractFactory\Interface\TV;

class SonyTVFactory implements CompanyFactory
{

    public function makeLedTV(int $numberOfLEDs = 100): TV
    {
        return new SonyLedTV($numberOfLEDs);
    }

    public function makeLCDTV(): TV
    {
        return new SonyLcdTV();
    }
}