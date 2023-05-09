<?php

namespace Homeandriy\Ithillel\Utils;

use Throwable;

class InvalidPasswordException extends \Exception
{
    private string $prepareMessage = 'User Password cannot be empty or longer than 8 characters';
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message =
            "<br><strong>Error: $this->prepareMessage </strong><br> <strong>File: </strong> " . $this->getFile() .
            "<br> <strong>Line: </strong>" . $this->getLine() ."<br>";
    }
}