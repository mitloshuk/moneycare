<?php

namespace MoneyCare\Dictionaries;

/**
 * Class BaseDictionary
 *
 * @package MoneyCare\Dictionaries
 */
abstract class BaseDictionary
{
    /**
     * Format
     * [
     *  `key`  => `label`,
     *  `key2` => `label2`,
     * ]
     *
     * @return array
     */
    abstract public static function getLabels(): array;

    /**
     * @param string|int $value
     *
     * @return string|int
     */
    public static function getLabel($value)
    {
        return static::getLabels()[$value];
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return array_keys(static::getLabels());
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public static function exists($value): bool
    {
        return in_array($value, static::getValues(), true);
    }
}