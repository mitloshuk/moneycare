<?php

namespace MoneyCare\Exceptions\PredefinedValue;

use MoneyCare\Dictionaries\BaseDictionary;
use MoneyCare\Exceptions\MoneyCareException;
use Throwable;

/**
 * Exception for bad credit type
 *
 * Class CreditTypeException
 *
 * @package MoneyCare\Exceptions
 */
abstract class PredefinedValueException extends MoneyCareException
{
    /**
     * @return string
     */
    abstract protected function getFieldName(): string;

    /**
     * @return string
     */
    abstract protected function getDictionaryClassName(): string;

    /**
     * MoneyCareException constructor.
     *
     * @param                $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            $message ?: 'Bad value of `' . $this->getFieldName() . '`. Use one of ' . $this->getDictionary()::getValues(),
            $code,
            $previous
        );
    }

    protected function getDictionary(): BaseDictionary
    {
        $class = $this->getDictionaryClassName();

        return new $class();
    }
}