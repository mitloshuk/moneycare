<?php

namespace Tests\Unit;

use Codeception\PHPUnit\TestCase;
use MoneyCare\MoneyCare;
use MoneyCare\Requests\CreateOrderRequest;
use MoneyCare\Requests\OrderDetailsRequest;
use MoneyCare\Requests\UpdateOrderRequest;
use MoneyCare\Requests\UpdateStatusRequest;

class MoneyCareTest extends TestCase
{
    /**
     * Test syntax sugar
     */
    public function testRequestsSugar(): void
    {
        $moneyCare = new MoneyCare('test');

        self::assertInstanceOf(CreateOrderRequest::class, $moneyCare->createOrder());
        self::assertInstanceOf(OrderDetailsRequest::class, $moneyCare->orderDetails());
        self::assertInstanceOf(UpdateOrderRequest::class, $moneyCare->updateOrder());
        self::assertInstanceOf(UpdateStatusRequest::class, $moneyCare->updateStatus());
    }
}