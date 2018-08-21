<?php

namespace BlockMatrix\EosRpc;

use BlockMatrix\EosRpc\Adapter\Http\HttpInterface;
use BlockMatrix\EosRpc\Adapter\Settings\SettingsInterface;

/**
 * Class WalletController
 *
 * Access the various API methods in the Wallet API.
 *
 * See https://eosio.github.io/eos/group__eosiorpc.html for more details
 */
class WalletController
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
     * WalletController constructor.
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
     * @param  $endpoint
     *
     * @return string
     */
    protected function buildUrl($endpoint): string
    {
        return $this->settings->rpcKeosd() . '/' . $this->version . $endpoint;
    }

    /**
     * Creates a new wallet with the given name
     *
     * @param  string $name
     *
     * @return string Wallet password
     */
    public function create(string $name = 'default'): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/create'),
            "\"$name\""
        );
    }

    /**
     * Opens an existing wallet of the given name
     *
     * @param  string $name
     *
     * @return string
     */
    public function open(string $name = 'default'): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/open'),
            "\"$name\""
        );
    }

    /**
     * Locks an existing wallet of the given name
     *
     * @return string
     */
    public function lock(string $name = 'defaut'): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/lock'),
            "\"$name\""
        );
    }

    /**
     * Locks all existing wallets
     *
     * @return string
     */
    public function lockAll(): string
    {
        return $this->client->get($this->buildUrl('/wallet/lock_all'));
    }

    /**
     * Unlocks a wallet with the given name and password
     *
     * @param  array $args['name','password']
     *
     * @return string
     */
    public function unlock(array $args): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/unlock'),
            $args
        );
    }

    /**
     * Imports a private key to the wallet of the given name
     *
     * @param  array $args['name','privateKey']
     *
     * @return string
     */
    public function importKey(array $args): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/import_key'),
            $args
        );
    }

    /**
     * Removes a key pair from the wallet of the given name
     *
     * @param  array $args['name','password','publicKey']
     *
     * @return string
     */
    public function removeKey(array $args): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/remove_key'),
            $args
        );
    }

    /**
     * Creates a key pair and import
     *
     * @param  string $name
     * @param  string $keyType
     *
     * @return string
     */
    public function createKey(string $name, string $keyType): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/create_key'),
            [
                $name,
                $keyType
            ]
        );
    }

    /**
     * Lists all wallets
     *
     * @return string
     */
    public function listWallets(): string
    {
        return $this->client->get($this->buildUrl('/wallet/list_wallets'));
    }

    /**
     * Lists all key pairs of given wallet
     *
     * @param  array $args['name','privateKey']
     *
     * @return string
     */
    public function listKeys(array $args): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/list_keys'),
            $args
        );
    }

    /**
     * Lists all public keys across all wallets
     *
     * @return string
     */
    public function getPublicKeys(): string
    {
        return $this->client->get($this->buildUrl('/wallet/get_public_keys'));
    }

    /**
     * Sets wallet auto lock timeout (in seconds)
     *
     * @param  int time
     *
     * @return string
     */
    public function setTimeout(int $time): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/set_timeout'),
            $time
        );
    }

    /**
     * Signs a transaction
     *
     * @param  array  $txn
     * @param  array  $keys
     * @param  string $id   ChainId
     *
     * @return string
     */
    public function signTransaction(array $txn, array $keys, string $id): string
    {
        return $this->client->post(
            $this->buildUrl('/wallet/sign_transaction'),
            [
                $txn,
                $keys,
                $id
            ]
        );
    }
}
