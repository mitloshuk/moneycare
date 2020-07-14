<?php

namespace MoneyCare\Tests\Feature;

use Cassandra\Date;
use Codeception\PHPUnit\TestCase;
use MoneyCare\Clients\HttpClient;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Exceptions\MoneyCareException;
use MoneyCare\Exceptions\Api\MoneyCareUnauthorizedException;
use MoneyCare\Interfaces\HttpClientInterface;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\OrderUpdating;
use MoneyCare\Models\Passport;
use MoneyCare\MoneyCare;
use MoneyCare\Requests\UpdateOrderRequest;
use MoneyCare\Responses\CreateResponse;

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
        /**
         * @var HttpClientInterface $httpClient
         */
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->onlyMethods(['request'])
            ->getMock();

        $httpClient->method('request')->willReturn(json_encode([
            'id'       => '112233',
            'accepted' => false,
            'reason'   => null,
            'formUrl'  => null,
        ]));

        $moneyCare = new MoneyCare('api_test', '1234567', $httpClient);

        $good = (new Good())->setPrice(10000);
        $passport = (new Passport())->setIssueDate(new \DateTime('now'))
            ->setNumber(123123)
            ->setSeries(1234);

        $model = (new OrderCreation())->addGood($good)
            ->setForceScore(true)
            ->setPassport($passport)
            ->setFirstName('Артем')
            ->setSecondName('Артемович')
            ->setLastName('Артемов')
            ->setBirthDay(new \DateTime('now'))
            ->setPointId('tt_test_1');

        $response = $moneyCare->createOrder($model)->execute();

        self::assertEquals('112233', $response->getOrderId());
        self::assertEquals(false, $response->getIsAccepted());
    }
}