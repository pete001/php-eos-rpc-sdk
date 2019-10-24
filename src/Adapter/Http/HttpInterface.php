<?php

namespace BlockMatrix\EosRpc\Adapter\Http;

interface HttpInterface
{
    /**
     * Perform GET request
     *
     * @param string $url The request URL
     *
     * @return string The request response
     */
    public function get(string $url): string;

    /**
     * POST Request
     *
     * @param string       $url    The request url
     * @param string|array $params Post data
     *
     * @return string The request response
     */
    public function post(string $url, $params): string;
}
