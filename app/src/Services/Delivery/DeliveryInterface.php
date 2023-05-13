<?php

namespace Homeandriy\Ithillel\Services\Delivery;

interface DeliveryInterface
{
    public function delivery(string $formattedString): void;
}