<?php

namespace MoneyCare\Dictionaries;

/**
 * Class OrderStatusesDictionary
 *
 * @package MoneyCare\Dictionaries
 */
class OrderStatusesDictionary extends BaseDictionary
{
    public const PROCESSING = 'processing';
    public const DELIVERY   = 'delivery';
    public const COMPLETED  = 'completed';
    public const CANCELLED  = 'cancelled';

    /**
     * {@inheritDoc}
     */
    public static function getLabels(): array
    {
        return [
            self::PROCESSING => 'Обработка',
            self::DELIVERY   => 'Доставка',
            self::COMPLETED  => 'Завершен',
            self::CANCELLED  => 'Отменен',
        ];
    }
}