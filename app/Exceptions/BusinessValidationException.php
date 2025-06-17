<?php

namespace App\Exceptions;

use Exception;

class BusinessValidationException extends Exception
{
    /**
     * Create a new business validation exception instance.
     *
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $code = 400, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}