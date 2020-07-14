<?php

namespace MoneyCare\Models;

use MoneyCare\Exceptions\PredefinedValue\GoodTypeException;
use MoneyCare\Exceptions\ModelRequiredFieldException;

/**
 * Class Model
 *
 * @package MoneyCare\Models
 */
abstract class Model
{
    /**
     * Get required fields array
     *
     * @return string[]
     */
    protected function getRequired(): array
    {
        return [];
    }

    /**
     * @return array
     * @throws ModelRequiredFieldException
     */
    public function getData(): array
    {
        $data = [];

        foreach (get_object_vars($this) as $var => $value) {
            if ($this->validateField($var, $value)) {
                $data[$var] = $value;
            }
        }

        return $data;
    }

    /**
     * @param string $field
     * @param        $value
     *
     * @return mixed|null
     * @throws ModelRequiredFieldException
     */
    protected function validateField(string $field, $value): bool
    {
        if ($value === null && in_array($field, $this->getRequired(), true)) {
            throw new ModelRequiredFieldException($field, $this);
        }

        return $value !== null;
    }
}