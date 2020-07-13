<?php

namespace MoneyCare\Tests\Feature;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Clients\HttpClient;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Exceptions\MoneyCareUnauthorizedException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\OrderUpdating;
use MoneyCare\MoneyCare;
use MoneyCare\Requests\UpdateOrderRequest;

class CreateOrderTest extends TestCase
{
    public function testExceptions()
    {
        $this->expectException(MoneyCareException::class);

        /**
         * @var HttpClient $httpClient
         */
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->onlyMethods(['request'])
            ->getMock();

        $httpClient->method('request')->willReturnCallback(static function () {
            throw new MoneyCareUnauthorizedException();
        });


        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)->setPointId('tt_test_1');

        $moneyCare = new MoneyCare('123', '123', $httpClient);

        $moneyCare->createOrder($model)->execute();
    }

    public function testCreate()
    {
        $moneyCare = new MoneyCare('api_test', '1234567');

        $good = (new Good())->setPrice(10000);

        $model = (new OrderCreation())->addGood($good)
            ->setPointId('tt_test_1');

        $response = $moneyCare->createOrder($model)->execute();
    }

    public function testUpdate()
    {
        $moneyCare = new MoneyCare('api_test', '1234567');

        $good = (new Good())->setPrice(10000);

        $model = (new OrderUpdating())->setPointId(123);

        $response = $moneyCare->createOrder($model)->execute();
    }
}