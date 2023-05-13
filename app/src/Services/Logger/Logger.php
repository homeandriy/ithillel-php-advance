<?php

namespace Homeandriy\Ithillel\Services\Logger;

use Homeandriy\Ithillel\Services\Format\FormatInterface;
use Homeandriy\Ithillel\Services\Delivery\DeliveryInterface;

class Logger implements LoggerInterface
{

    private FormatInterface $format;
    private DeliveryInterface $delivery;

    public function __construct(FormatInterface $format, DeliveryInterface $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }

    public function log(string $string): void
    {
        $this->delivery->delivery($this->format->format($string));
    }
}