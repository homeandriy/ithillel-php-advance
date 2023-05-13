<?php

namespace Homeandriy\Ithillel\Services\Delivery;


class EmailDelivery implements DeliveryInterface
{
    public function delivery(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) по имейл<br>";
    }
}