<?php

namespace MoneyCare\Requests;

use MoneyCare\MoneyCare;

/**
 * Class UpdateStatusRequest
 *
 * @package MoneyCare\Requests
 */
class UpdateStatusRequest extends MoneyCareRequest
{
    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $status;

    /**
     * OrderDetailsRequest constructor.
     *
     * @param MoneyCare $moneyCare
     * @param string    $orderId
     * @param string    $status
     */
    public function __construct(MoneyCare $moneyCare, string $orderId, string $status)
    {
        parent::__construct($moneyCare);

        $this->orderId = $orderId;
        $this->status = $status;
    }

    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function execute(): void
    {
        $this->moneyCare->httpClient->put($this->getMethodUrl(), [
            'status' => $this->status,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    protected function getMethodUrl(): string
    {
        return self::API_URL . '/broker/api/v2/orders/' . $this->orderId . '/extstatus';
    }
}