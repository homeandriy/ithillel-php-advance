<?php

namespace Homeandriy\Ithillel\Controller;

use Homeandriy\Ithillel\Service\Database\Database;
use SplObjectStorage;

class Controller
{
    private Database $adapter;

    public function __construct(Database $mysql)
    {
        $this->adapter = $mysql;
    }

    public function getData(): SplObjectStorage
    {
        return $this->adapter->getData();
    }
}