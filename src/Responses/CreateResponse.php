<?php

namespace MoneyCare\Responses;

use MoneyCare\Interfaces\CreateResponseInterface;

class CreateResponse implements CreateResponseInterface
{
    protected $response;

    public function __construct(string $response)
    {
        $this->response = json_decode($response, true);
    }

    public function getOrderId(): string
    {
        return $this->response['id'];
    }

    public function getIsAccepted(): bool
    {
        return $this->response['accepted'] === "true";
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->response['reason'];
    }

    /**
     * @return string
     */
    public function getFormUrl(): string
    {
        return $this->response['formUrl'];
    }
}