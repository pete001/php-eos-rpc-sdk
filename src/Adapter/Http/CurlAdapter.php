<?php

namespace BlockMatrix\EosRpc\Adapter\Http;

use BlockMatrix\EosRpc\Exception\HttpException;
use Curl\Curl;

/**
 * Class CurlAdapter
 *
 * Fetching the HTTP resource via Guzzle
 */
class CurlAdapter implements HttpInterface
{
    /**
     * @var Curl
     */
    protected $client;

    /**
     * CurlAdapter constructor
     *
     * @param Curl $client
     */
    public function __construct(Curl $client)
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
            $this->client->get($url);
        } catch (\Throwable $t) {
            throw new HttpException("GET Request failed: {$t->getMessage()}");
        }

        return json_encode($this->client->response, JSON_PRETTY_PRINT);
    }

    /**
     * Perform POST request
     *
     * mixed $params string or array
     *
     * @param string $url    The request URL
     * @param mixed  $params Additional POST params
     *
     * @throws \Exception For failed requests
     *
     * @return string The POST response
     */
    public function post(string $url, $params): string
    {
        try {
            if (is_array($params))
                $this->client->post($url, json_encode($params));
            else
                $this->client->post($url, $params);
        } catch (\Throwable $t) {
            throw new HttpException("POST Request failed: {$t->getMessage()}");
        }

        return json_encode($this->client->response, JSON_PRETTY_PRINT);
    }
}
