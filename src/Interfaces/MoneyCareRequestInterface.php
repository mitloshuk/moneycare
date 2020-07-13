<?php

namespace MoneyCare\Interfaces;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;

/**
 * Interface MoneyCareRequestInterface
 *
 * @package MoneyCare\Interfaces
 */
interface MoneyCareRequestInterface
{
    /**
     * Execute request
     *
     * @return mixed
     *
     * @throws ModelRequiredFieldException
     * @throws MoneyCareException
     */
    public function execute();
}