<?php

namespace MoneyCare\Requests\Interfaces;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Responses\DetailsResponse;

/**
 * Interface OrderDetailsRequestInterface
 *
 * @package MoneyCare\Interfaces
 */
interface OrderDetailsRequestInterface
{
    /**
     * Execute creation request
     *
     * @return DetailsResponse
     *
     * @throws ModelRequiredFieldException
     * @throws MoneyCareException
     */
    public function execute(): DetailsResponse;
}