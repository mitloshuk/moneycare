<?php

namespace MoneyCare\Requests;

use MoneyCare\Models\OrderCreation;
use MoneyCare\MoneyCare;
use MoneyCare\Requests\Interfaces\CreateOrderRequestInterface;
use MoneyCare\Responses\CreateResponse;

/**
 * Class CreateOrderRequest
 *
 * @link https://moneycare.atlassian.net/wiki/spaces/MCAPIEXTORDER/pages/1703966
 *
 * @package MoneyCare\Requests
 */
class CreateOrderRequest extends BaseMoneyCareRequest implements CreateOrderRequestInterface
{
    /**
     * @var OrderCreation
     */
    protected $model;

    /**
     * CreateOrderRequest constructor.
     *
     * @param MoneyCare     $moneyCare
     * @param OrderCreation $model
     */
    public function __construct(MoneyCare $moneyCare, OrderCreation $model)
    {
        parent::__construct($moneyCare);

        $this->model = $model;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(): CreateResponse
    {
        $response = $this->moneyCare->httpClient->post($this->getMethodUrl(), $this->model->getData());

        return new CreateResponse($response);
    }

    /**
     * @return string
     */
    protected function getMethodUrl(): string
    {
        return self::API_URL . '/broker/api/v2/orders/create';
    }
}