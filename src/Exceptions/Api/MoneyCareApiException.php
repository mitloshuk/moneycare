<?php

namespace MoneyCare\Exceptions\Api;

use MoneyCare\Exceptions\MoneyCareException;
use Throwable;

/**
 * Exception for MoneyCare API errors
 *
 * Class MoneyCareErrorException
 *
 * @package MoneyCare\Exceptions
 */
class MoneyCareApiException extends MoneyCareException
{
    /**
     * MoneyCareErrorException constructor.
     *
     * @param string         $errorJson
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $errorJson, $code = 0, Throwable $previous = null)
    {
        parent::__construct('MoneyCare API returns error: ' . $errorJson, $code, $previous);
    }
}