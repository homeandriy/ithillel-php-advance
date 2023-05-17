<?php

namespace Homeandriy\Ithillel\Service\Database;

use SplObjectStorage;

interface Database
{
    /**
     * Get all data from storage
     * Return SplObjectStorage collection
     *
     * @return SplObjectStorage
     */
    public function getData(): SplObjectStorage;
}