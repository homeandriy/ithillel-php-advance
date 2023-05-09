<?php

namespace Homeandriy\Ithillel\Utils;

class InvalidUserIdException extends \Exception
{
    protected string $prepareMessage = 'User id mus be integer';
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message =
            "<br><strong>Error: </strong>$this->prepareMessage<br> <strong>File: </strong> " . $this->getFile() .
            "<br> <strong>Line: </strong>" . $this->getLine() ."<br>";
    }
}