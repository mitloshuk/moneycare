<?php

namespace MoneyCare\Requests;

use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\MoneyCare;
use MoneyCare\Responses\DetailsResponse;

/**
 * Class OrderDetailsRequest
 *
 * @package MoneyCare\Requests
 */
class OrderDetailsRequest extends MoneyCareRequest
{
    /**
     * @var string
     */
    protected $orderId;

    /**
     * OrderDetailsRequest constructor.
     *
     * @param MoneyCare $moneyCare
     * @param string    $orderId
     */
    public function __construct(MoneyCare $moneyCare, string $orderId)
    {
        parent::__construct($moneyCare);

        $this->orderId = $orderId;
    }

    /**
     * {@inheritDoc}
     *
     * @return DetailsResponse
     * @throws MoneyCareException
     */
    public function execute(): DetailsResponse
    {
        $response = $this->moneyCare->httpClient->get($this->getMethodUrl());

        return new DetailsResponse($response);
    }

    /**
     * {@inheritDoc}
     */
    protected function getMethodUrl(): string
    {
        return self::API_URL . '/broker/api/v2/orders/' . $this->orderId . '/details';
    }
}