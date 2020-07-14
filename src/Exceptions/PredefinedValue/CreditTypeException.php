<?php

namespace MoneyCare\Exceptions\PredefinedValue;

use MoneyCare\Dictionaries\CreditTypesDictionary;

/**
 * Exception for bad credit type
 *
 * Class CreditTypeException
 *
 * @package MoneyCare\Exceptions
 */
class CreditTypeException extends PredefinedValueException
{
    protected function getDictionaryClassName(): string
    {
        return CreditTypesDictionary::class;
    }

    protected function getFieldName(): string
    {
        return 'credit type';
    }
}