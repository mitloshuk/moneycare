<?php

namespace MoneyCare\Requests\Interfaces;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;

/**
 * Interface UpdateStatusRequestInterface
 *
 * @package MoneyCare\Interfaces
 */
interface UpdateStatusRequestInterface
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