<?php

namespace MoneyCare\Models;

/**
 * Class Service
 *
 * @package MoneyCare\Models
 */
class Service extends Model
{
    /**
     * Name of service
     *
     * @var string
     */
    protected $product;

    /**
     * Company of service
     *
     * @var string
     */
    protected $company;

    /**
     * Series
     *
     * @var string
     */
    protected $certSeries;

    /**
     * Number
     *
     * @var string
     */
    protected $certNumber;

    /**
     * Service price
     *
     * @var float
     */
    protected $price;

    /**
     * {@inheritDoc}
     */
    protected function getRequired(): array
    {
        return [
            'price',
        ];
    }

    /**
     * @param string $product
     *
     * @return $this
     */
    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @param string $company
     *
     * @return $this
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $certSeries
     *
     * @return $this
     */
    public function setCertSeries(string $certSeries): self
    {
        $this->certSeries = $certSeries;

        return $this;
    }

    /**
     * @return string
     */
    public function getCertSeries(): string
    {
        return $this->certSeries;
    }

    /**
     * @param string $certNumber
     *
     * @return $this
     */
    public function setCertNumber(string $certNumber): self
    {
        $this->certNumber = $certNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCertNumber(): string
    {
        return $this->certNumber;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}