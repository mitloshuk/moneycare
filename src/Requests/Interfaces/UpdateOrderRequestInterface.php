<?php

namespace MoneyCare\Requests\Interfaces;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;

/**
 * Interface UpdateOrderRequestInterface
 *
 * @package MoneyCare\Interfaces
 */
interface UpdateOrderRequestInterface
{
    /**
     * Execute creation request
     *
     * @return void
     *
     * @throws ModelRequiredFieldException
     * @throws MoneyCareException
     */
    public function execute(): void;
}