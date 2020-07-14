<?php

namespace MoneyCare;

use MoneyCare\Clients\HttpClient;
use MoneyCare\Interfaces\HttpClientInterface;
use MoneyCare\Models\OrderUpdating;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Requests\CreateOrderRequest;
use MoneyCare\Requests\OrderDetailsRequest;
use MoneyCare\Requests\UpdateOrderRequest;
use MoneyCare\Requests\UpdateStatusRequest;

class MoneyCare
{
    /**
     * @var HttpClientInterface
     */
    public $httpClient;

    /**
     * MoneyCare constructor.
     *
     * @param string                   $username
     * @param string                   $password
     * @param HttpClientInterface|null $httpClient
     */
    public function __construct(
        string $username,
        string $password,
        ?HttpClientInterface $httpClient = null
    ) {
        $this->httpClient = $httpClient ?: new HttpClient();
        $this->httpClient->setAuth($username, $password);
    }

    /**
     * @param OrderCreation $model
     *
     * @return CreateOrderRequest
     */
    public function createOrder(OrderCreation $model): CreateOrderRequest
    {
        return new CreateOrderRequest($this, $model);
    }

    /**
     * @param string $orderId
     * @param OrderUpdating $model
     *
     * @return UpdateOrderRequest
     */
    public function updateOrder(string $orderId, OrderUpdating $model): UpdateOrderRequest
    {
        return new UpdateOrderRequest($this, $orderId, $model);
    }

    /**
     * @param string $orderId
     *
     * @return OrderDetailsRequest
     */
    public function orderDetails(string $orderId): OrderDetailsRequest
    {
        return new OrderDetailsRequest($this, $orderId);
    }

    /**
     * @param string $orderId
     * @param string $status
     *
     * @return UpdateStatusRequest
     */
    public function updateStatus(string $orderId, string $status): UpdateStatusRequest
    {
        return new UpdateStatusRequest($this, $orderId, $status);
    }
}