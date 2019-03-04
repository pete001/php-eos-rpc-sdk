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
     * @param  mixed  $id
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
     * Get actions related to an account
     *
     * string $account_name Account name to query
     * int $pos Position in action log
     * int $offset Offset in action log
     *
     * @param  string  $account_name
     * @param  int  $pos
     * @param  int  $offset
     * @return string
     */
    public function getActions($account_name, $pos, $offset): string
    {
        return $this->client->post(
            $this->buildUrl('/history/get_actions'),
            ['account_name' => $account_name, 'pos' => $pos, 'offset' => $offset]
        );
    }

    /**
     * Get information related to a block header state
     *
     * mixed $id Block num or id
     *
     * @param  mixed  $id
     * @return string
     */
    public function getBlockHeaderState($id): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_block_header_state'),
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
     * Get account abi
     *
     * string $name Account name
     *
     * @return string
     */
    public function getAbi(string $name): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_abi'),
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
    public function getCode(string $name, ?bool $code_as_wasm = false): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_code'),
            [
                'account_name' => $name
            ] + ($code_as_wasm ? ['code_as_wasm' => $code_as_wasm] : [])
        );
    }

    /**
     * Get raw code and abi
     *
     * string $name Name
     *
     * @return string
     */
    public function getRawCodeAndAbi(string $name): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_raw_code_and_abi'),
            ['account_name' => $name]
        );
    }

    /**
     * Fetch smart contract data from an account
     *
     * @param string $scope
     * @param string $code
     * @param string $table
     * @param array  $extra An optional array of additional parameters to add, such as `limit`
     *
     * @return string
     */
    public function getTableRows(string $scope, string $code, string $table, array $extra = []): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_table_rows'),
            [
                'scope' => $scope,
                'code'  => $code,
                'table' => $table,
                'json'  => true,
            ] + $extra
        );
    }

    /**
     * Get the currency balance for a defined account
     *
     * @param string      $code
     * @param string      $account
     * @param null|string $symbol  Optional filter currency symbol
     *
     * @return string
     */
    public function getCurrencyBalance(string $code, string $account, ?string $symbol = null): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_currency_balance'),
            [
                'code'    => $code,
                'account' => $account,
            ] + ($symbol ? ['symbol' => $symbol] : [])
        );
    }

    /**
     * Get currency stats
     *
     * @param string $code
     * @param string $symbol
     *
     * @return string
     */
    public function getCurrencyStats(string $code, string $symbol): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_currency_stats'),
            [
                'code'   => $code,
                'symbol' => $symbol,
            ]
        );
    }

    /**
     * Get registered producers
     *
     * @param int         $limit      Optional pagination limit
     * @param string|null $lowerBound Optional producer account name to control pagination
     *
     * @return string
     */
    public function getProducers(int $limit = 10, ?string $lowerBound = null): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_producers'),
            [
                'limit' => $limit,
                'json'  => true
            ] + ($lowerBound ? ['lower_bound' => $lowerBound] : [])
        );
    }

    /**
     * Serialize json to binary hex
     * The resulting binary hex is usually used for the data field in push_transaction
     *
     * @param string $code
     * @param string $action
     * @param array  $args
     *
     * @return string
     */
    public function abiJsonToBin(string $code, string $action, array $args): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/abi_json_to_bin'),
            [
                'code'   => $code,
                'action' => $action,
                'args'   => $args,
            ]
        );
    }

    /**
     * Serialize back binary hex to json
     *
     * @param string $code
     * @param string $action
     * @param string $binArgs
     *
     * @return string
     */
    public function abiBinToJson(string $code, string $action, string $binArgs): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/abi_bin_to_json'),
            [
                'code'    => $code,
                'action'  => $action,
                'binargs' => $binArgs,
            ]
        );
    }

    /**
     * Get the required keys needed to sign a transaction
     *
     * @param string $transaction
     * @param array  $available_keys
     *
     * @return string
     */
    public function getRequiredKeys(array $transaction, array $available_keys): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/get_required_keys'),
            [
                'transaction'    => $transaction,
                'available_keys' => $available_keys,
            ]
        );
    }

    /**
     * Push a transaction
     *
     * @param string $expiration
     * @param string $ref_block_num
     * @param string $ref_block_prefix
     * @param array  $extra An optional array of additional parameters to add
     *
     * @return string
     */
    public function pushTransaction(string $expiration, string $ref_block_num, string $ref_block_prefix,
                                    array $extra = []): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/push_transaction'),
            [
                'compression' => 'none',
                'transaction' => [
                    'expiration'             => $expiration,
                    'ref_block_num'          => $ref_block_num,
                    'ref_block_prefix'       => $ref_block_prefix,
                    'context_free_actions'   => [],
                    'actions'                => $extra['actions'],
                    'transaction_extensions' => [],
                ],
                'signatures'  => $extra['signatures']
            ]
        );
    }

    public function pushTransactions(array $body): string
    {
        return $this->client->post(
            $this->buildUrl('/chain/push_transactions'),
            $body
        );
    }
}
