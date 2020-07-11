<?php

namespace MoneyCare\Requests;

/**
 * Class CreateOrderRequest
 *
 * @link https://moneycare.atlassian.net/wiki/spaces/MCAPIEXTORDER/pages/1703966
 *
 * @package MoneyCare\Requests
 */
class CreateOrderRequest extends MoneyCareRequest
{
    protected $orderId;

    public function execute()
    {
        $r = $this->moneyCare->httpClient->post($this->getMethodUrl(), [
            'pointId' => 'tt_test_1'
        ]);

        die(var_dump($r));
    }

    protected function getMethodUrl()
    {
        return self::API_URL . '/broker/api/v2/orders/create';
    }
}