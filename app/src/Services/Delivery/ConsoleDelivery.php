<?php

namespace Homeandriy\Ithillel\Services\Delivery;

class ConsoleDelivery implements DeliveryInterface
{
    public function delivery(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) в консоль <br>";
    }
}