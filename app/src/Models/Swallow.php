<?php

namespace Homeandriy\Ithillel\Models;

use Homeandriy\Ithillel\Models\Animals\Animal;
use Homeandriy\Ithillel\Models\Birds\Bird;
use Homeandriy\Ithillel\Service\Eat\Eat;

class Swallow implements Bird, Animal
{
    private int $calories = 0;

    public function eat(Eat $eat): Animal
    {
        $this->calories += $eat->getCalories();

        return $this;
    }

    public function fly(): void
    {
        echo self::class . ': I can fly <br>';
    }

    public function getCalories(): int
    {
        return $this->calories;
    }
}