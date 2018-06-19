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
        return $this->settings->rpcNode() . '/' . $this->version . $endpoint;
    }

    /**
     * Get latest information related to a node
     *
     * @return string
     */
    public function getInfo(): string
    {
        return $this->client->get($this->buildUrl('/chain/get_info'));
    }

    /**
     * Get information related to a block
     *
     * mixed $id Block num or id
     *
     * @return string
     */
    public function getBlock($id): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_block'),
            ['block_num_or_id' => $id]
        );
    }

    /**
     * Get information related to an account
     *
     * string $name Account name
     *
     * @return string
     */
    public function getAccount(string $name): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_account'),
            ['account_name' => $name]
        );
    }

    /**
     * Fetch smart contract code
     *
     * string $name Name
     *
     * @return string
     */
    public function getCode(string $name): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_code'),
            ['account_name' => $name]
        );
    }

    /**
     * Fetch smart contract data from an account
     *
     * string $name Name
     *
     * @return string
     */
    public function getTableRows(string $scope, string $code, string $table, int $limit = 0): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_table_rows'),
            [
                'scope' => $scope,
                'code' => $code,
                'table' => $table,
                'limit' => $limit,
                'json' => true,
            ]
        );
    }
}
