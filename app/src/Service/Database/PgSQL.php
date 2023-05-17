<?php

namespace Homeandriy\Ithillel\Service\Database;

use Homeandriy\Ithillel\Common\DB;
use Homeandriy\Ithillel\Utils\Faker;
use SplObjectStorage;

class PgSQL implements Database
{
    private DB $connect;

    public function __construct()
    {
        $this->connect = new DB('db', 'ithillel_db', 'pguser', 'supersecret');
    }

    public function getData(): SplObjectStorage
    {
        $this->connect->query('SELECT * FROM "Products"', []);

        $data = $this->connect->getResult();
        // Fil table if empty
        // if (empty($data)) {
        //      $this->fillData();
        //      $data = $this->connect->getResult();
        // }

        $storage = new SplObjectStorage();
        // Transform data
        foreach ($data as $object) {
            $storage->attach($object, $object->slug);
        }
        unset($data); // clear garbage
        return $storage;
    }

    private function fillData(): void
    {
        Faker::fillProductTable($this->connect, 30);
    }
}