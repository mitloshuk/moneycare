<?php

namespace MoneyCare\Requests;

use MoneyCare\Interfaces\MoneyCareRequestInterface;
use MoneyCare\MoneyCare;

/**
 * Class MoneyCareRequest
 *
 * @package MoneyCare\Requests
 */
abstract class MoneyCareRequest implements MoneyCareRequestInterface
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