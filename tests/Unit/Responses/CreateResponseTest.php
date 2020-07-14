<?php

namespace MoneyCare\Tests\Unit\Responses;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Responses\CreateResponse;

/**
 * Class CreateResponseTest
 *
 * @package MoneyCare\Tests\Unit\Responses
 */
class CreateResponseTest extends TestCase
{
    /**
     * @return void
     */
    public function testResponse(): void
    {
        $responseString = json_encode($this->getParams());

        $response = new CreateResponse($responseString);

        self::assertEquals('79590919', $response->getOrderId());
        self::assertEquals(true, $response->getIsAccepted());
        self::assertEquals('This is reason', $response->getReason());
        self::assertEquals('http://form.url.ru/path', $response->getFormUrl());
    }

    /**
     * @return array
     */
    protected function getParams(): array
    {
        return [
            'id' => '79590919',
            'accepted' => 'true',
            'reason' => 'This is reason',
            'formUrl' => 'http://form.url.ru/path',
        ];
    }
}