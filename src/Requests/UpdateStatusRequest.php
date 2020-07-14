<?php

namespace MoneyCare\Requests;

use MoneyCare\MoneyCare;
use MoneyCare\Requests\Interfaces\UpdateStatusRequestInterface;

/**
 * Class UpdateStatusRequest
 *
 * @link https://moneycare.atlassian.net/wiki/spaces/MCAPIEXTORDER/pages/26476545
 *
 * @package MoneyCare\Requests
 */
class UpdateStatusRequest extends BaseMoneyCareRequest implements UpdateStatusRequestInterface
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