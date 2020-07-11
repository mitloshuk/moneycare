<?php

namespace MoneyCare\Tests\Feature;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Clients\HttpClient;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Exceptions\MoneyCareUnauthorizedException;
use MoneyCare\MoneyCare;

class CreateOrderTest extends TestCase
{
    public function testExecute()
    {
        $this->expectException(MoneyCareException::class);

        /**
         * @var HttpClient $httpClient
         */
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->onlyMethods(['request'])
            ->getMock();

        $httpClient->method('request')->willReturnCallback(static function(){
            throw new MoneyCareUnauthorizedException();
        });

        $moneyCare = new MoneyCare('api_test', '1234567', $httpClient);

        $moneyCare->createOrder()->execute();
    }
}