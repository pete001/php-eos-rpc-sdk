<?php

namespace BlockMatrix\EosRpc\Adapter\Http;

use BlockMatrix\EosRpc\Exception\HttpException;
use GuzzleHttp\Client as Guzzle;

/**
 * Class GuzzleAdapter
 *
 * Fetching the HTTP resource via Guzzle
 */
class GuzzleAdapter implements HttpInterface
{
    /**
     * @var Guzzle
     */
    protected $client;

    /**
     * GuzzleAdapter constructor
     *
     * @param Guzzle $client
     */
    public function __construct(Guzzle $client)
    {
        $this->client = $client;
    }

    /**
     * Perform GET request
     *
     * @param string $url The request URL
     *
     * @throws \Exception For failed requests
     *
     * @return string The GET response
     */
    public function get(string $url): string
    {
        try {
            $response = $this->client->get($url, ['headers' => ['Accept' => 'application/json']]);
        } catch (\Throwable $t) {
            throw new HttpException("GET Request failed: {$t->getMessage()}");
        }

        return (string) $response->getBody();
    }

    /**
     * Perform POST request
     *
     * @param string $url    The request URL
     * @param array  $params Additional POST params
     *
     * @throws \Exception For failed requests
     *
     * @return string The POST response
     */
    public function post(string $url, array $params): string
    {
        try {
            $response = $this->client->post($url, ['headers' => ['Accept' => 'application/json'], 'form_params' => $params]);
        } catch (\Throwable $t) {
            throw new HttpException("POST Request failed: {$t->getMessage()}");
        }

        return (string) $response->getBody();
    }
}
