<?php

namespace MoneyCare\Responses;

use MoneyCare\Interfaces\DetailsResponseInterface;
use MoneyCare\Models\Good;
use MoneyCare\Models\Service;

/**
 * Class DetailsResponse
 *
 * @package MoneyCare\Responses
 */
class DetailsResponse implements DetailsResponseInterface
{
    /**
     * @var array
     */
    protected $response;

    /**
     * DetailsResponse constructor.
     *
     * @param string $response
     */
    public function __construct(string $response)
    {
        $this->response = json_decode($response, true);

        if (!empty($this->response['goods'])) {
            $goods = [];

            foreach ($this->response['goods'] as $good) {
                $goods[] = (new Good())->setPrice($good['price'])
                    ->setBrand($good['brand'])
                    ->setGroupName($good['groupName'])
                    ->setModel($good['model'])
                    ->setTitle($good['title'])
                    ->setSerialNumber($good['serialNumber']);
            }

            $this->response['goods'] = $goods;
        }

        if (!empty($this->response['services'])) {
            $services = [];

            foreach ($this->response['services'] as $service) {
                $services[] = (new Service())->setPrice($service['price'])
                    ->setCertNumber($service['certNumber'])
                    ->setCertSeries($service['certSeries'])
                    ->setCompany($service['company'])
                    ->setProduct($service['product']);
            }

            $this->response['services'] = $services;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): string
    {
        return $this->response['status'];
    }

    /**
     * {@inheritDoc}
     */
    public function getBankId(): string
    {
        return $this->response['bankId'];
    }

    /**
     * {@inheritDoc}
     */
    public function getProductCode(): string
    {
        return $this->response['productCode'];
    }

    /**
     * {@inheritDoc}
     */
    public function getProductTitle(): string
    {
        return $this->response['productTitle'];
    }

    /**
     * {@inheritDoc}
     */
    public function getProductType(): string
    {
        return $this->response['productType'];
    }

    /**
     * {@inheritDoc}
     */
    public function getDownPayment(): float
    {
        return $this->response['downpayment'];
    }

    /**
     * {@inheritDoc}
     */
    public function getCreditLimit(): float
    {
        return $this->response['creditLimit'];
    }

    /**
     * {@inheritDoc}
     */
    public function getCreditLimitCartOnly(): float
    {
        return $this->response['creditLimitCartOnly'];
    }

    /**
     * {@inheritDoc}
     */
    public function getContractNumber(): string
    {
        return $this->response['contractNumber'];
    }

    /**
     * {@inheritDoc}
     */
    public function getInternalProductCode(): string
    {
        return $this->response['internalProductCode'];
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestedProductCode(): string
    {
        return $this->response['requestedProductCode'];
    }

    /**
     * {@inheritDoc}
     */
    public function getGoods(): array
    {
        return $this->response['goods'];
    }

    /**
     * {@inheritDoc}
     */
    public function getServices(): array
    {
        return $this->response['services'];
    }
}