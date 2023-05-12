<?php

namespace Homeandriy\Ithillel\Models;

class Product implements Model
{
    public const NAME = 'name';
    protected array $data = [];

    /**
     * @param  string  $name
     * @param  mixed  $value
     *
     * @return void
     */
    public function set(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * @param  string  $property
     *
     * @return mixed
     */
    public function get(string $property): mixed
    {
        return $this->data[$property] ?? '';
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->data;
    }
}
