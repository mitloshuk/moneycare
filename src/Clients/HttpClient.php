<?php

namespace MoneyCare\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MoneyCare\Exceptions\HttpClientErrorException;
use MoneyCare\Exceptions\MoneyCareApiException;
use MoneyCare\Exceptions\MoneyCareErrorException;
use MoneyCare\Exceptions\MoneyCareUnauthorizedException;
use MoneyCare\Interfaces\HttpClientInterface;

/**
 * Class HttpClient
 *
 * @package MoneyCare\Clients
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var array
     */
    protected $auth = [];

    /**
     * @var Client
     */
    protected $client;

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'http_errors' => false,
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function setAuth(string $username, string $password): void
    {
        $this->auth = [$username, $password];
    }

    /**
     * {@inheritDoc}
     */
    public function post(string $uri, array $params): string
    {
        return $this->request($uri, 'post', $params);
    }

    /**
     * {@inheritDoc}
     */
    public function put(string $uri, array $params): string
    {
        return $this->request($uri, 'put', $params);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $uri, array $params): string
    {
        return $this->request($uri, 'get', $params);
    }

    /**
     * @param string $uri
     * @param string $method
     * @param array  $params
     *
     * @return string
     * @throws HttpClientErrorException
     * @throws MoneyCareApiException
     */
    protected function request(string $uri, string $method, array $params): string
    {
        try {
            $response = $this->client->$method($uri, [
                'json' => $params,
                'auth' => $this->auth,
            ]);
        } catch (GuzzleException $e) {
            throw new HttpClientErrorException('HttpClient error', 0, $e);
        }

        $body = $response->getBody()->getContents();

        switch ($response->getStatusCode())
        {
            case 401:
                throw new MoneyCareUnauthorizedException();

            case 200:
                return $body;

            default:
                throw new MoneyCareApiException($body);
        }
    }
}