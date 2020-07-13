<?php

namespace MoneyCare\Exceptions;

use Exception;
use MoneyCare\Dictionaries\GoodTypesDictionary;
use Throwable;

/**
 * Exception for bad good type
 *
 * Class GoodTypeException
 *
 * @package MoneyCare\Exceptions
 */
class GoodTypeException extends MoneyCareException
{
    /**
     * MoneyCareException constructor.
     *
     * @param                $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?: 'Bad good type, please use one of: ' . GoodTypesDictionary::getValues(), $code, $previous);
    }
}