<?php

namespace App\Exceptions;

use Exception;

class ServiceException extends Exception
{
    public function __construct(string $message = "Service Exception", int $code = 500)
    {
        parent::__construct($message, $code);
    }
}
