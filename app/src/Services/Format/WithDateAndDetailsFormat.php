<?php
namespace Homeandriy\Ithillel\Services\Format;

class WithDateAndDetailsFormat implements FormatInterface
{

    private string $details = '';

    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . ': ' . $string . ' - ' . $this->getDetails();
    }

    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    public function getDetails(): string
    {
        return $this->details;
    }
}