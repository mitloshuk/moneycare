<?php

namespace MoneyCare\Exceptions\PredefinedValue;

use MoneyCare\Dictionaries\GoodTypesDictionary;

/**
 * Exception for bad good type
 *
 * Class GoodTypeException
 *
 * @package MoneyCare\Exceptions
 */
class GoodTypeException extends PredefinedValueException
{
    protected function getDictionaryClassName(): string
    {
        return GoodTypesDictionary::class;
    }

    protected function getFieldName(): string
    {
        return 'good type';
    }
}