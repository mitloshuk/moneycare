<?php

namespace MoneyCare\Dictionaries;

/**
 * Class CreditStatusesDictionary
 *
 * @package MoneyCare\Dictionaries
 */
class CreditStatusesDictionary extends BaseDictionary
{
    public const ONLINE_FORM = 'online_form';
    public const PROCESSING  = 'processing';
    public const CONTRACT    = 'contract';
    public const END         = 'end';
    public const CANCEL      = 'cancel';
    public const DECLINE     = 'decline';
    public const SCORING     = 'scoring';

    /**
     * {@inheritDoc}
     */
    public static function getLabels(): array
    {
        return [
            self::ONLINE_FORM => 'Заполнение формы',
            self::PROCESSING  => 'Обработка заявки',
            self::CONTRACT    => 'Подписание договора',
            self::END         => 'Кредит выдан',
            self::CANCEL      => 'Заявка отменена',
            self::DECLINE     => 'Отказ в кредите',
            self::SCORING     => 'Скоринг',
        ];
    }
}