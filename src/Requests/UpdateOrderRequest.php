<?php

namespace MoneyCare\Requests;

use MoneyCare\Models\OrderUpdating;
use MoneyCare\MoneyCare;
use MoneyCare\Requests\Interfaces\UpdateOrderRequestInterface;

/**
 * Class UpdateOrderRequest
 *
 * @link https://moneycare.atlassian.net/wiki/spaces/MCAPIEXTORDER/pages/28021130
 *
 * @package MoneyCare\Requests
 */
class UpdateOrderRequest extends BaseMoneyCareRequest implements UpdateOrderRequestInterface
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
     */
    public function execute(): void
    {
        $this->moneyCare->httpClient->put($this->getMethodUrl(), $this->model->getData());
    }

    /**
     * @return string
     */
    protected function getMethodUrl(): string
    {
        return self::API_URL . '/broker/api/v2/orders/' . $this->orderId . '/update';
    }
}