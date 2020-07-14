<?php

namespace MoneyCare\Requests;

use MoneyCare\Models\OrderUpdating;
use MoneyCare\MoneyCare;

/**
 * Class UpdateOrderRequest
 *
 * @package MoneyCare\Requests
 */
class UpdateOrderRequest extends MoneyCareRequest
{
    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var OrderUpdating
     */
    protected $model;

    /**
     * UpdateOrderRequest constructor.
     *
     * @param MoneyCare     $moneyCare
     * @param string        $orderId
     * @param OrderUpdating $model
     */
    public function __construct(MoneyCare $moneyCare, string $orderId, OrderUpdating $model)
    {
        parent::__construct($moneyCare);

        $this->model = $model;
        $this->orderId = $orderId;
    }

    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function execute(): string
    {
        return $this->moneyCare->httpClient->put($this->getMethodUrl(), $this->model->getData());
    }

    /**
     * @return string
     */
    protected function getMethodUrl(): string
    {
        return self::API_URL . '/broker/api/v2/orders/' . $this->orderId . '/update';
    }
}