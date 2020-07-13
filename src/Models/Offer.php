<?php

namespace MoneyCare\Models;

/**
 * Class Offer
 *
 * @package MoneyCare\Models
 */
class Offer extends Model
{
    /**
     * Code of offer
     *
     * @var string
     */
    protected $id;

    /**
     * Code of bank
     *
     * @var string
     */
    protected $bankId;

    /**
     * {@inheritDoc}
     */
    protected function getRequired(): array
    {
        return [
            'id',
            'bankId',
        ];
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $bankId
     *
     * @return $this
     */
    public function setBankId(string $bankId): self
    {
        $this->bankId = $bankId;

        return $this;
    }
}