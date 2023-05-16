<?php

namespace Homeandriy\Ithillel\Models\Animals;

use Homeandriy\Ithillel\Service\Eat\Eat;

interface Animal
{
    public function eat(Eat $eat): self;

    public function getCalories(): int;
}