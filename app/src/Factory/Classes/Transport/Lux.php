<?php

namespace Homeandriy\Ithillel\Factory\Classes\Transport;

use Homeandriy\Ithillel\Factory\Interfaces\Car;

class Lux implements Car
{
    public const TYPE = 'lux';
    public function getModel(): string
    {
        return 'Audi Q7';
    }

    public function getColor(): string
    {
        return 'Black';
    }

    public function getPrice(float $clearPrice): float
    {
        return mt_rand(7, 9) * $clearPrice;
    }
}