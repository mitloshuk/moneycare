<?php

namespace MoneyCare;

use MoneyCare\Clients\HttpClient;
use MoneyCare\Interfaces\HttpClientInterface;
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
     * @return CreateOrderRequest
     */
    public function createOrder(): CreateOrderRequest
    {
        return new CreateOrderRequest($this);
    }

    /**
     * @return UpdateOrderRequest
     */
    public function updateOrder(): UpdateOrderRequest
    {
        return new UpdateOrderRequest($this);
    }

    /**
     * @return OrderDetailsRequest
     */
    public function orderDetails(): OrderDetailsRequest
    {
        return new OrderDetailsRequest($this);
    }

    /**
     * @return UpdateStatusRequest
     */
    public function updateStatus(): UpdateStatusRequest
    {
        return new UpdateStatusRequest($this);
    }
}