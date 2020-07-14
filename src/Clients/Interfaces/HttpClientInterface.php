<?php

namespace MoneyCare\Clients\Interfaces;

use MoneyCare\Exceptions\MoneyCareException;

/**
 * Interface HttpClientInterface
 *
 * @package MoneyCare\Interfaces
 */
interface HttpClientInterface
{
    /**
     * @param string $username
     * @param string $password
     */
    public function setAuth(string $username, string $password): void;

    /**
     * @param string $uri
     * @param array  $params
     *
     * @return string
     * @throws MoneyCareException
     */
    public function post(string $uri, array $params): string;

    /**
     * @param string $uri
     * @param array  $params
     *
     * @return string
     * @throws MoneyCareException
     */
    public function put(string $uri, array $params): string;

    /**
     * @param string $uri
     *
     * @return string
     * @throws MoneyCareException
     */
    public function get(string $uri): string;
}