<?php

namespace Homeandriy\Ithillel\Repository;

use Homeandriy\Ithillel\Models\Model;

interface Repository
{
    /**
     * @param  Model  $model
     */
    public function __construct(Model $model);

    /**
     * @return void
     */
    public function save(): void;

    /**
     * @return void
     */
    public function update(): void;

    /**
     * @return void
     */
    public function delete(): void;

}
