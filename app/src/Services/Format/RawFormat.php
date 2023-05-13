<?php

namespace Homeandriy\Ithillel\Services\Format;

class RawFormat implements FormatInterface
{

    public function format(string $string): string
    {
        return $string;
    }

}