<?php

namespace MoneyCare\Exceptions;

use Exception;
use Throwable;

/**
 * Exception for MoneyCare package
 *
 * Class MoneyCareException
 *
 * @package MoneyCare\Exceptions
 */
class MoneyCareException extends Exception
{
    /**
     * MoneyCareException constructor.
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