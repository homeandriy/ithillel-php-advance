<?php

namespace Homeandriy\Ithillel\Services;

use Homeandriy\Ithillel\Common\Transport;

class SenderService
{
    public function __invoke(Transport $transport): bool
    {
        return $transport->send();
    }
}
