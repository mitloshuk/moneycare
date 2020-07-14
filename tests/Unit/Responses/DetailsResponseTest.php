<?php

namespace MoneyCare\Tests\Unit\Responses;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Responses\DetailsResponse;

/**
 * Class DetailsResponseTest
 *
 * @package MoneyCare\Tests\Unit\Responses
 */
class DetailsResponseTest extends TestCase
{
    /**
     * @return void
     */
    public function testResponse(): void
    {
        $responseString = json_encode($this->getParams());

        $response = new DetailsResponse($responseString);

        $testStrings = [
            'status',
            'bankId',
            'productCode',
            'productTitle',
            'productType',
            'contractNumber',
            'internalProductCode',
            'requestedProductCode',
        ];
        foreach ($testStrings as $idx => $testString) {
            $method = 'get' . ucfirst($testString);

            self::assertEquals('test-string' . ($idx + 1), $response->$method());
        }

        $testFloats = [
            'downPayment',
            'creditLimit',
            'creditLimitCartOnly',
        ];
        foreach ($testFloats as $testFloat) {
            $method = 'get' . ucfirst($testFloat);

            self::assertEquals(12.5, $response->$method());
        }

        $goods = $response->getGoods();
        $services = $response->getServices();

        foreach($goods as $good)
        {
            self::assertEquals(12.5, $good->getPrice());
            self::assertEquals('test-string1', $good->getGroupName());
            self::assertEquals('test-string2', $good->getBrand());
            self::assertEquals('test-string3', $good->getModel());
            self::assertEquals('test-string4', $good->getTitle());
            self::assertEquals('test-string5', $good->getSerialNumber());
        }

        foreach($services as $service)
        {
            self::assertEquals(12.5, $service->getPrice());
            self::assertEquals('test-string1', $service->getProduct());
            self::assertEquals('test-string2', $service->getCompany());
            self::assertEquals('test-string3', $service->getCertSeries());
            self::assertEquals('test-string4', $service->getCertNumber());
        }
    }

    /**
     * @return array
     */
    protected function getParams(): array
    {
        return [
            'status'               => 'test-string1',
            'bankId'               => 'test-string2',
            'productCode'          => 'test-string3',
            'productTitle'         => 'test-string4',
            'productType'          => 'test-string5',
            'downpayment'          => 12.5,
            'creditLimit'          => 12.5,
            'creditLimitCartOnly'  => 12.5,
            'contractNumber'       => 'test-string6',
            'internalProductCode'  => 'test-string7',
            'requestedProductCode' => 'test-string8',
            'goods'                => [
                [
                    'groupName'    => 'test-string1',
                    'brand'        => 'test-string2',
                    'model'        => 'test-string3',
                    'title'        => 'test-string4',
                    'serialNumber' => 'test-string5',
                    'price'        => 12.5,
                ],
                [
                    'groupName'    => 'test-string1',
                    'brand'        => 'test-string2',
                    'model'        => 'test-string3',
                    'title'        => 'test-string4',
                    'serialNumber' => 'test-string5',
                    'price'        => 12.5,
                ],
            ],
            'services'             => [
                [
                    'product'    => 'test-string1',
                    'company'    => 'test-string2',
                    'certSeries' => 'test-string3',
                    'certNumber' => 'test-string4',
                    'price'      => 12.5,
                ],
                [
                    'product'    => 'test-string1',
                    'company'    => 'test-string2',
                    'certSeries' => 'test-string3',
                    'certNumber' => 'test-string4',
                    'price'      => 12.5,
                ],
            ],
        ];
    }
}