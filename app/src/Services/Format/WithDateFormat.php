<?php

namespace Homeandriy\Ithillel\Services\Format;

class WithDateFormat implements FormatInterface
{

    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . ': ' . $string;
    }
}