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
     * @param  string|null            $path
     * @param  string                 $env
     * @param  SettingsInterface|null $settings
     * @param  HttpInterface|null     $http
     *
     * @return WalletController
     * @throws Exception\SettingsException
     * @throws Exception\SettingsNotFoundException
     * @throws \ErrorException
     */
    public function api(string $path = null, string $env = '.env', SettingsInterface $settings = null, HttpInterface $http = null): WalletController
    {
        $path = $path ?? dirname(__DIR__);
        $settings = $settings ?? new DotenvAdapter(new Dotenv($path, $env));
        $http = $http ?? new CurlAdapter(new Curl);

        return new WalletController(
            $settings,
            $http
        );
    }
}
