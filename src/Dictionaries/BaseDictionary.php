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
    abstract public function getLabels(): array;

    /**
     * @param string|int $value
     *
     * @return string|int
     */
    public function getLabel($value)
    {
        return $this->getLabels()[$value];
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return array_keys($this->getLabels());
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function exists($value): bool
    {
        return in_array($value, $this->getValues(), true);
    }
}