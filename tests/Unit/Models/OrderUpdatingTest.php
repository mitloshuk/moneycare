<?php

namespace MoneyCare\Tests\Unit\Models;

use MoneyCare\Models\OrderUpdating;

class OrderUpdatingTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return OrderUpdating::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getSpecificMethodsForSettersTest(): array
    {
        return [
            'goods' => 'addGood',
        ];
    }
}