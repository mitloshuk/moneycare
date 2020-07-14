<?php

namespace MoneyCare\Requests\Interfaces;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Responses\CreateResponse;

/**
 * Interface CreateOrderRequestInterface
 *
 * @package MoneyCare\Interfaces
 */
interface CreateOrderRequestInterface
{
    /**
     * Execute creation request
     *
     * @return CreateResponse
     *
     * @throws ModelRequiredFieldException
     * @throws MoneyCareException
     */
    public function execute(): CreateResponse;
}