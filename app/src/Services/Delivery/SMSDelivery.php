<?php

namespace Homeandriy\Ithillel\Services\Delivery;

class SMSDelivery implements DeliveryInterface
{
    public function delivery(string $formattedString): void
    {
        echo "Вывод формата ({$formattedString}) в смс <br>";
    }
}