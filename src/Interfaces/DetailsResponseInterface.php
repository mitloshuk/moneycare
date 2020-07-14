<?php

namespace MoneyCare\Interfaces;

use MoneyCare\Models\Good;
use MoneyCare\Models\Service;

interface DetailsResponseInterface
{
    /**
     * Get order status
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Get bank id
     *
     * @return string
     */
    public function getBankId(): ?string;

    /**
     * Bank product code
     *
     * @return string
     */
    public function getProductCode(): ?string;

    /**
     * Bank product name
     *
     * @return string
     */
    public function getProductTitle(): ?string;

    /**
     * Bank product type (classic, installment)
     *
     * @return string
     */
    public function getProductType(): ?string;

    /**
     * First payment
     *
     * @return float
     */
    public function getDownPayment(): ?float;

    /**
     * Amount of credit (full)
     *
     * @return float
     */
    public function getCreditLimit(): ?float;

    /**
     * Amount of credit (only goods)
     *
     * @return float
     */
    public function getCreditLimitCartOnly(): ?float;

    /**
     * Credit contract number
     *
     * @return string
     */
    public function getContractNumber(): ?string;

    /**
     * Internal code of bank product
     *
     * @return string
     */
    public function getInternalProductCode(): ?string;

    /**
     * Requisted code of bank product
     *
     * @return string
     */
    public function getRequestedProductCode(): ?string;

    /**
     * Array of goods
     *
     * @return Good[]
     */
    public function getGoods(): ?array;

    /**
     * Array of services
     *
     * @return Service[]
     */
    public function getServices(): ?array;
}