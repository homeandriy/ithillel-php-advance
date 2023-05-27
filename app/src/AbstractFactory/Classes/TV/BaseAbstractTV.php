<?php

namespace Homeandriy\Ithillel\AbstractFactory\Classes\TV;

use Homeandriy\Ithillel\AbstractFactory\Interface\TV;

abstract class BaseAbstractTV implements TV
{
    protected string $company;
    protected string $type;
    protected int $maximumBrightness = 700;
}