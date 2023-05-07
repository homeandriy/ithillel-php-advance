<?php

namespace Homeandriy\Ithillel\Services;

use Homeandriy\Ithillel\Utils\Trait1;
use Homeandriy\Ithillel\Utils\Trait2;
use Homeandriy\Ithillel\Utils\Trait3;

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::test insteadof Trait2, Trait3;
        Trait2::test as test2;
        Trait3::test as test3;
    }

    /**
     * Get sum methods
     *
     * Зробив методи приватними, щоб їх не можна було викликати зі створеного об'єкта,
     * проте, можливо, їх потрібно було залишити публічними
     *
     * @return int
     */
    public function sum(): int
    {
        return $this->test() + $this->test2() + $this->test3();
    }
}