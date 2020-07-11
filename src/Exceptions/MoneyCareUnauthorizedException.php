<?php

namespace MoneyCare\Exceptions;

use Exception;
use Throwable;

/**
 * Exception for Unauthorized request
 *
 * Class MoneyCareErrorException
 *
 * @package MoneyCare\Exceptions
 */
class MoneyCareUnauthorizedException extends MoneyCareApiException
{
    /**
     * MoneyCareErrorException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = 'MoneyCare API auth failed', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}