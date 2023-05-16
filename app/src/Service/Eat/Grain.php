<?php

namespace Homeandriy\Ithillel\Service\Eat;

class Grain implements Eat
{

    public function getCalories(): int
    {
        return 50;
    }
}