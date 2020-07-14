<?php

namespace MoneyCare\Requests;

use MoneyCare\MoneyCare;
use MoneyCare\Requests\Interfaces\OrderDetailsRequestInterface;
use MoneyCare\Responses\DetailsResponse;

/**
 * Class OrderDetailsRequest
 *
 * @link https://moneycare.atlassian.net/wiki/spaces/MCAPIEXTORDER/pages/17334303
 *
 * @package MoneyCare\Requests
 */
class OrderDetailsRequest extends BaseMoneyCareRequest implements OrderDetailsRequestInterface
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