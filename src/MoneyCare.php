<?php

namespace MoneyCare;

use MoneyCare\Clients\HttpClient;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Interfaces\HttpClientInterface;
use MoneyCare\Models\OrderUpdating;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Requests\CreateOrderRequest;
use MoneyCare\Requests\OrderDetailsRequest;
use MoneyCare\Requests\UpdateOrderRequest;
use MoneyCare\Requests\UpdateStatusRequest;
use MoneyCare\Responses\CreateResponse;
use MoneyCare\Responses\DetailsResponse;

/**
 * Class MoneyCare
 *
 * @package MoneyCare
 */
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
     * @return CreateResponse
     * @throws MoneyCareException
     */
    public function createOrder(OrderCreation $model): CreateResponse
    {
        return (new CreateOrderRequest($this, $model))->execute();
    }

    /**
     * @param string        $orderId
     * @param OrderUpdating $model
     *
     * @return void
     * @throws MoneyCareException
     */
    public function updateOrder(string $orderId, OrderUpdating $model): void
    {
        (new UpdateOrderRequest($this, $orderId, $model))->execute();
    }

    /**
     * @param string $orderId
     *
     * @return DetailsResponse
     * @throws MoneyCareException
     */
    public function orderDetails(string $orderId): DetailsResponse
    {
        return (new OrderDetailsRequest($this, $orderId))->execute();
    }

    /**
     * @param string $orderId
     * @param string $status
     *
     * @return void
     * @throws MoneyCareException
     */
    public function updateStatus(string $orderId, string $status): void
    {
        (new UpdateStatusRequest($this, $orderId, $status))->execute();
    }
}