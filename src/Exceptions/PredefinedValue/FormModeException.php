<?php

namespace MoneyCare\Exceptions\PredefinedValue;

use MoneyCare\Dictionaries\FormModesDictionary;

/**
 * Exception for bad form mode
 *
 * Class FormModeException
 *
 * @package MoneyCare\Exceptions
 */
class FormModeException extends PredefinedValueException
{
    protected function getDictionaryClassName(): string
    {
        return FormModesDictionary::class;
    }

    protected function getFieldName(): string
    {
        return 'form mode';
    }
}