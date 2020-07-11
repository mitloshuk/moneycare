<?php

namespace MoneyCare\Dictionaries;

/**
 * Class FormModesDictionary
 *
 * @package MoneyCare\Dictionaries
 */
class FormModesDictionary extends BaseDictionary
{
    public const STANDALONE = 'standalone';
    public const IFRAME     = 'iframe';

    /**
     * {@inheritDoc}
     */
    public function getLabels(): array
    {
        return [
            self::STANDALONE => 'Отдельная страница',
            self::IFRAME     => 'Встраивание в iframe',
        ];
    }
}