<?php

require_once '../vendor/autoload.php';

$walapi = (new \BlockMatrix\EosRpc\WalletFactory)->api();


echo ($walletPassword = trim($walapi->create("testwallet"), "\"")) . PHP_EOL;
echo $walapi->open("testwallet") . PHP_EOL;
echo $walapi->lock("testwallet") . PHP_EOL;
echo $walapi->lockAll() . PHP_EOL;
echo $walapi->unlock(["testwallet", $walletPassword]) . PHP_EOL;
echo $walapi->importKey(["testwallet", "5Jmsawgsp1tQ3GD6JyGCwy1dcvqKZgX6ugMVMdjirx85iv5VyPR"]) . PHP_EOL;
echo $walapi->removeKey(["testwallet", $walletPassword, "EOS7ijWCBmoXBi3CgtK7DJxentZZeTkeUnaSDvyro9dq7Sd1C3dC4"]) . PHP_EOL;
echo $walapi->createKey("testwallet", "K1") . PHP_EOL;
echo $walapi->listWallets() . PHP_EOL;
echo $walapi->listKeys(["testwallet", $walletPassword]) . PHP_EOL;
echo $walapi->getPublicKeys() . PHP_EOL;
echo $walapi->setTimeout(60) . PHP_EOL;
echo $walapi->signTransaction(
    [
        "expiration" => "2018-08-23T06:35:30",
        "ref_block_num" => 22985,
        "ref_block_prefix" => 3016594541,
        "max_net_usage_workds" => 0,
        "delay_sec" => 0,
        "context_free_actions" => [],
        "actions" => [
            [
                "account" => "eosio.token",
                "name" => "transfer",
                "authorization" => [
                    [
                        "actor" => "user",
                        "permission" => "active"
                    ]
                ],
                "data" => "00000000007015d6000000005c95b1ca102700000000000004454f53000000000c757365722d3e746573746572"
            ]
        ],
        "transaction_extensions" => []
    ],
    [
        "EOS7ijWCBmoXBi3CgtK7DJxentZZeTkeUnaSDvyro9dq7Sd1C3dC4"
    ],
    "cf057bbfb72640471fd910bcb67639c22df9f92470936cddc1ade0e2f2e7dc4f"
);
