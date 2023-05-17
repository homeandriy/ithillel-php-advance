<?php

namespace Homeandriy\Ithillel\Service\Database;

use Faker\Factory;
use SplObjectStorage;
use stdClass;

class MySQL implements Database
{
    public function getData(): SplObjectStorage
    {
        $storage = new SplObjectStorage();
        $faker = Factory::create('en_US');
        for ($i = 0; $i < mt_rand(10, 200); $i++) {
            // Crate object
            $dataObj = new stdClass();
            for ($y = 0; $y < mt_rand(2, 10); $y++) {
                // Rand properties
                $dataObj->{$faker->word()} = $faker->uuid();
            }
            $storage->attach($dataObj, $faker->word());
            unset($dataObj);
        }
        return $storage;
    }
}