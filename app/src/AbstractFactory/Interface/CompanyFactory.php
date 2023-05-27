<?php
namespace Homeandriy\Ithillel\AbstractFactory\Interface;
interface CompanyFactory
{
    public function makeLedTV(int $numberOfLEDs = 100): TV;

    public function makeLCDTV(): TV;
}