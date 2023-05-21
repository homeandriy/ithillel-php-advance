<?php

namespace Homeandriy\Ithillel\Factory\Classes\Transport;

use Homeandriy\Ithillel\Factory\Interfaces\Car;

class Economy implements Car
{
    public const TYPE = 'economy';

    public function getModel(): string
    {
        return 'Kia Rio';
    }

    public function getColor(): string
    {
        return 'Gray';
    }

    public function getPrice(float $clearPrice): float
    {
        return mt_rand(2,4) * $clearPrice;
    }
}