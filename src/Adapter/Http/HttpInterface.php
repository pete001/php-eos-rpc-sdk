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
     * @param string $url    The request url
     * @param bool   $verify Whether the verify the secure URL
     *
     * @return string The request response
     */
    public function post(string $url, array $params): string;
}
