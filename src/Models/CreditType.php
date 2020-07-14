<?php

namespace MoneyCare\Models;

use MoneyCare\Dictionaries\CreditTypesDictionary;
use MoneyCare\Exceptions\PredefinedValue\CreditTypeException;

/**
 * Class CreditType
 *
 * @package MoneyCare\Models
 */
class CreditType extends Model
{
    /**
     * Type of credit
     *
     * @var string
     */
    protected $creditType;

    /**
     * {@inheritDoc}
     */
    protected function getRequired(): array
    {
        return [
            'creditType',
        ];
    }

    /**
     * @param string $creditType
     *
     * @return $this
     * @throws CreditTypeException
     */
    public function setCreditType(string $creditType): self
    {
        if (!CreditTypesDictionary::exists($creditType)) {
            throw new CreditTypeException();
        }

        $this->creditType = $creditType;

        return $this;
    }
}