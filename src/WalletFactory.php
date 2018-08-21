<?php

namespace BlockMatrix\EosRpc;

use BlockMatrix\EosRpc\Adapter\Http\CurlAdapter;
use BlockMatrix\EosRpc\Adapter\Http\HttpInterface;
use BlockMatrix\EosRpc\Adapter\Settings\DotenvAdapter;
use BlockMatrix\EosRpc\Adapter\Settings\SettingsInterface;
use Curl\Curl;
use Dotenv\Dotenv;

/**
 * Class WalletFactory
 *
 * Simple factory methods to help speed up integration
 */
class WalletFactory
{
    /**
     * Simple convenience factory which can be overloaded or used with defaults
     *
     * @param string                 $env
     * @param SettingsInterface|null $settings
     * @param HttpInterface|null     $http
     *
     * @return WalletController
     */
    public function api(string $env = '.env', SettingsInterface $settings = null, HttpInterface $http = null): WalletController
    {
        $settings = $settings ?? new DotenvAdapter(new Dotenv(dirname(__DIR__), $env));
        $http = $http ?? new CurlAdapter(new Curl);

        return new WalletController(
            $settings,
            $http
        );
    }
}
