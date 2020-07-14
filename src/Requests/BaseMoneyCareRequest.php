<?php

namespace MoneyCare\Requests;

use MoneyCare\MoneyCare;

/**
 * Class BaseMoneyCareRequest
 *
 * @package MoneyCare\Requests
 */
abstract class BaseMoneyCareRequest
{
    protected const API_URL = 'https://mc.moneycare.su';

    /**
     * @var MoneyCare
     */
    protected $moneyCare;

    /**
     * CreateOrderRequest constructor.
     *
     * @param MoneyCare $moneyCare
     */
    public function __construct(MoneyCare $moneyCare)
    {
        $this->moneyCare = $moneyCare;
    }

    /**
     * Return absolute url for method
     *
     * @return string
     */
    abstract protected function getMethodUrl(): string;
}