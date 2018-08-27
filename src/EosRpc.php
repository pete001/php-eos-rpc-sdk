<?php
namespace BlockMatrix\EosRpc;

use BlockMatrix\EosRpc\ChainController;
use BlockMatrix\EosRpc\WalletController;
use BlockMatrix\EosRpc\Exception\EosRpcException;
use DateTimeImmutable;
use DateTimeZone;
use DateInterval;

/**
 * Class EosRpc
 *
 * Easy methods using Chain API and Wallet API.
 */
class EosRpc
{
    /**
     * @var ChainController
     */
    protected $chain;

    /**
     * @var WalletController
     */
    protected $wallet;

    /**
     * $var array
     */
    protected $walletInfo;

    /**
     * EosRpc constructor.
     *
     * @param ChainController  $chain
     * @param WalletController $wallet
     */
    public function __construct(ChainController $chain, WalletController $wallet)
    {
        $this->chain = $chain;
        $this->wallet = $wallet;
    }

    /**
     * Sets wallet info
     *
     * @param  string $walletName
     * @param  string $walletPwd
     */
    public function setWalletInfo(string $walletName, string $walletPwd)
    {
        $this->walletInfo[0] = $walletName;
        $this->walletInfo[1] = $walletPwd;
    }

    /**
     * Make a transaction with the given actions and return
     *
     * @param  array  $actions
     *
     * $actions format:
     * $actions[0] = [
     *     'account'       => $code,
     *     'name'          => $action,
     *     'authorization' => [
     *         [
     *             'actor'         => $authority['actor'],
     *             'permission'    => $authority['permission']
     *         ]
     *     ],
     *     'data' => $args
     * ];
     *
     * @return array Transaction
     * @throws \Exception
     */
    public function makeTransaction(array $actions): array
    {
        // abi_json_to_bin
        foreach ($actions as $key => $value) {
            $actions[$key]['data'] = json_decode(
                $this->chain->abiJsonToBin($value['account'], $value['name'], $value['data']),
                true)['binargs'];
        }

        // get_info
        $info = json_decode($this->chain->getInfo(), true);
        $chainId = $info['chain_id'];
        $chainDate = new DateTimeImmutable($info['head_block_time'], new DateTimeZone('UTC'));
        $expiration = $chainDate->add(new DateInterval('PT1H'));
        $expiration = $expiration->format('Y-m-d\TH:i:s');

        // get block
        $block = json_decode($this->chain->getBlock($info['last_irreversible_block_num']), true);
        $ref_block_num = $info['last_irreversible_block_num'] & 0xFFFF;
        $ref_block_prefix = $block['ref_block_prefix'];

        // unlock wallet
        $this->wallet->unlock($this->walletInfo);

        // get required keys
        $transaction = [
            'expiration'             => $expiration,
            'ref_block_num'          => $ref_block_num,
            'ref_block_prefix'       => $ref_block_prefix,
            'max_net_usage_words'    => 0,
            'delay_sec'              => 0,
            'context_free_actions'   => [],
            'actions'                => $actions,
            'transaction_extensions' => []
        ];
        $available_keys = json_decode($this->wallet->getPublicKeys(), true);
        $required_keys = json_decode($this->chain->getRequiredKeys($transaction, $available_keys), true)['required_keys'];

        // sign transaction
        $transaction = json_decode($this->wallet->signTransaction($transaction, $required_keys, $chainId), true);
        $signatures = $transaction['signatures'];

        // lock wallet
        $this->wallet->lock($this->walletInfo[0]);

        // make transaction
        $transaction = [
            'compression' => 'none',
            'transaction' => [
                'expiration'             => $expiration,
                'ref_block_num'          => $ref_block_num,
                'ref_block_prefix'       => $ref_block_prefix,
                'context_free_actions'   => [],
                'actions'                => $actions,
                'transaction_extensions' => [],
            ],
            'signatures'  => $signatures
        ];

        return $transaction;
    }

    /**
     * Push a transaction with the given actions
     *
     * @param  array  $actions
     * @param  bool   $trxIdOnly
     *
     * $actions format:
     * $actions[0] = [
     *     'account'       => $code,
     *     'name'          => $action,
     *     'authorization' => [
     *         [
     *             'actor'         => $authority['actor'],
     *             'permission'    => $authority['permission']
     *         ]
     *     ],
     *     'data' => $args
     * ];
     *
     * @return array|string Transaction Result or ID
     * @throws EosRpcException
     */
    public function pushTransaction(array $actions, bool $trxIdOnly = true)
    {
        try {
            $transaction = $this->makeTransaction($actions);

            $expiration = $transaction['transaction']['expiration'];
            $ref_block_num = $transaction['transaction']['ref_block_num'];
            $ref_block_prefix = $transaction['transaction']['ref_block_prefix'];
            $extra = [
                'actions'    => $transaction['transaction']['actions'],
                'signatures' => $transaction['signatures']
            ];

            $result = json_decode(
                $this->chain->pushTransaction($expiration, $ref_block_num, $ref_block_prefix, $extra),
                true);

            if (array_key_exists('transaction_id', $result) === false)
                throw new EosRpcException(json_encode($result));

            return $trxIdOnly ? $result['transaction_id'] : $result;
        } catch (HttpException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Push transactions
     *
     * @param  array  $transactions
     *
     * $transactions format:
     * $transaction[0] = [
     *     'compression' => 'none',
     *     'transaction' => [
     *         'expiration'             => $expiration,
     *         'ref_block_num'          => $ref_block_num,
     *         'ref_block_prefix'       => $ref_block_prefix,
     *         'context_free_actions'   => [],
     *         'actions'                => $actions,
     *         'transaction_extensions' => [],
     *     ],
     *     'signatures'  => $signatures
     * ];
     *
     * @return array  Result of transactions
     */
    public function pushTransactions(array $transactions): array
    {
        return json_decode(
            $this->chain->pushTransactions($transactions),
            true);
    }

    /**
     * Push an action
     *
     * @param  string $code
     * @param  string $action
     * @param  array  $args Json format action arguments
     * @param  array  $authority['actor','permission']
     * @param  bool   $trxIdOnly
     *
     * @return array|string Transaction Result or ID
     * @throws EosRpcException
     */
    public function pushAction(string $code, string $action, array $args, array $authority, bool $trxIdOnly = true)
    {
        try {
            $actions[0] = [
                'account'       => $code,
                'name'          => $action,
                'authorization' => [
                    [
                        'actor'         => $authority['actor'],
                        'permission'    => $authority['permission']
                    ]
                ],
                'data' => $args
            ];

            return $this->pushTransaction($actions, $trxIdOnly);
        } catch (EosRpcException $e) {
            throw $e;
        }
    }

    /**
     * Transfers token
     *
     * @param  string $from
     * @param  string $to
     * @param  string $quantity
     * @param  string $memo
     * @param  string $contract
     * @param  bool   $trxIdOnly
     *
     * @return array|string Transaction Result or ID
     * @throws EosRpcException
     */
    public function transfer(string $from, string $to, string $quantity, string $memo,
                             string $contract = 'eosio.token', bool $trxIdOnly = true)
    {
        // push action $contract transfer '["$from", "$to", "$quantity", "$memo"]'

        try {
            $args = [
                'from'     => $from,
                'to'       => $to,
                'quantity' => $quantity,
                'memo'     => $memo
            ];

            $authority = [
                'actor'      => $from,
                'permission' => 'active'
            ];

            return $this->pushAction($contract, 'transfer', $args, $authority, $trxIdOnly);
        } catch (EosRpcException $e) {
            throw $e;
        }
    }

    /**
     * Creates a key pair and returns
     *
     * @param  string $keyType
     * @param  bool   $noImport An optional param to import keys or not
     *
     * @return array  ['publicKey','privateKey']
     */
    public function createKeyPair(string $keyType, bool $noImport = true): array
    {
        // unlock wallet
        $this->wallet->unlock($this->walletInfo);

        // create key
        $ret[0] = trim($this->wallet->createKey($this->walletInfo[0], $keyType), "\"");

        // list keys
        $keys = json_decode($this->wallet->listKeys($this->walletInfo), true);

        foreach($keys as $key => $value) {
            if ($value[0] == $ret[0]) {
                $ret[1] = $value[1];
                break;
            }
        }

        // remove key which is created and imported
        if ($noImport) {
            $this->wallet->removeKey(array_merge($this->walletInfo, [$ret[0]])) . PHP_EOL;
        }

        return $ret;
    }
}
