<?php

namespace Homeandriy\Ithillel\Common;

class Transport
{
    private array $config;
    private bool $connect = false;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->connect();
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    private function connect(): void
    {
        if ( ! $this->connect) {
            $this->connect = true;
        }
    }

    public function send(): bool
    {
        return true;
    }
}