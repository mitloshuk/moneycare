<?php

namespace MoneyCare\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MoneyCare\Clients\Interfaces\HttpClientInterface;
use MoneyCare\Exceptions\HttpClientErrorException;
use MoneyCare\Exceptions\Api\MoneyCareApiException;
use MoneyCare\Exceptions\Api\MoneyCareUnauthorizedException;
use Psr\Http\Message\ResponseInterface;

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
     * @return Client
     */
    protected function getClient(): Client
    {
        return $this->client;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuth(string $username, string $password): void
    {
        $this->auth = [$username, $password];
    }

    /**
     * @return array
     */
    public function getAuth(): array
    {
        return $this->auth;
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
    public function get(string $uri): string
    {
        return $this->request($uri, 'get');
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
    protected function request(string $uri, string $method, array $params = []): string
    {
        try {
            /**
             * @var ResponseInterface $response
             */
            $response = $this->getClient()->$method($uri, [
                'json' => $params,
                'auth' => $this->getAuth(),
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