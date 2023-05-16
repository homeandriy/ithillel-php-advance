<?php

namespace Homeandriy\Ithillel\Models;

use Homeandriy\Ithillel\Models\Animals\Animal;
use Homeandriy\Ithillel\Service\Eat\Eat;

class Ostrich implements Animal
{
    private int $calories = 0;

    public function eat(Eat $eat): Animal
    {
        $this->calories += $eat->getCalories();

        return $this;
    }

    public function getCalories(): int
    {
        return $this->calories;
    }
}