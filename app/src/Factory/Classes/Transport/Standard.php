<?php

namespace Homeandriy\Ithillel\Factory\Classes\Transport;

use Homeandriy\Ithillel\Factory\Interfaces\Car;

class Standard implements Car
{
    public const TYPE = 'standard';

    public function getModel(): string
    {
        return 'Volkswagen Passat B7';
    }

    public function getColor(): string
    {
        return 'Purple';
    }

    public function getPrice(float $clearPrice): float
    {
        return mt_rand(4, 7) * $clearPrice;
    }
}