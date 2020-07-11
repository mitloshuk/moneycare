<?php

namespace MoneyCare\Dictionaries;

/**
 * Class CreditTypesDictionary
 *
 * @package MoneyCare\Dictionaries
 */
class CreditTypesDictionary extends BaseDictionary
{
    public const CLASSIC     = 'classic';
    public const INSTALLMENT = 'installment';

    /**
     * {@inheritDoc}
     */
    public function getLabels(): array
    {
        return [
            self::CLASSIC     => 'Классический',
            self::INSTALLMENT => 'Рассрочка',
        ];
    }
}