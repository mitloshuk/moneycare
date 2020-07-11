<?php

namespace MoneyCare\Exceptions;

use Exception;
use Throwable;

/**
 * Exception for HttpClient request error
 *
 * Class HttpClientErrorException
 *
 * @package MoneyCare\Exceptions
 */
class HttpClientErrorException extends Exception
{
    /**
     * HttpClientErrorException constructor.
     *
     * @param                $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}