<?php

namespace BlockMatrix\EosRpc;

use BlockMatrix\EosRpc\Adapter\Http\HttpInterface;
use BlockMatrix\EosRpc\Adapter\Settings\SettingsInterface;

/**
 * Class ChainController
 *
 * Access the various API methods in the Chain API.
 *
 * See https://eosio.github.io/eos/group__eosiorpc.html for more details
 */
class ChainController
{
    /**
     * @var SettingsInterface
     */
    protected $settings;

    /**
     * @var HttpInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $version = 'v1';

    /**
     * ChainController constructor.
     *
     * @param SettingsInterface $settings
     * @param HttpInterface     $client
     */
    public function __construct(SettingsInterface $settings, HttpInterface $client)
    {
        $this->settings = $settings;
        $this->client = $client;
    }

    /**
     * Build the URI
     *
     * @param $endpoint
     *
     * @return string
     */
    protected function buildUrl($endpoint): string
    {
        return $this->settings->rpcNode() . '/' . $this->version . '/' . $endpoint;
    }

    /**
     * Get latest information related to a node
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->client->get($this->buildUrl('/chain/get_info'));
    }
}
