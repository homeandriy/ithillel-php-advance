<?php

namespace Homeandriy\Ithillel\Factory\Interfaces;

interface Car
{
    public function getModel(): string;

    public function getColor(): string;

    public function getPrice(float $clearPrice): float;
}