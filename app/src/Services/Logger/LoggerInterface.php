<?php

namespace Homeandriy\Ithillel\Services\Logger;

use Homeandriy\Ithillel\Services\Format\FormatInterface;
use Homeandriy\Ithillel\Services\Delivery\DeliveryInterface;

interface LoggerInterface
{
    public function __construct(FormatInterface $format, DeliveryInterface $delivery);

    public function log(string $string);
}