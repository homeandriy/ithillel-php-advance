<?php

namespace Homeandriy\Ithillel\Models;

/**
 * Model interface for base methods
 */
interface Model
{
    /**
     * @param  string  $name
     * @param  mixed  $value
     *
     * @return void
     */
    public function set(string $name, mixed $value): void;

    /**
     * @param  string  $property
     *
     * @return mixed
     */
    public function get(string $property): mixed;

    /**
     * @return array
     */
    public function list(): array;
}