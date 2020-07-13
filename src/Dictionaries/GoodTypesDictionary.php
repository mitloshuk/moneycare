<?php

namespace MoneyCare\Dictionaries;

/**
 * Class GoodTypesDictionary
 *
 * @package MoneyCare\Dictionaries
 */
class GoodTypesDictionary extends BaseDictionary
{
    public const PRODUCT = 'product';
    public const SERVICE = 'service';

    /**
     * {@inheritDoc}
     */
    public static function getLabels(): array
    {
        return [
            self::PRODUCT => 'Товар',
            self::SERVICE => 'Дополнительная услуга',
        ];
    }
}