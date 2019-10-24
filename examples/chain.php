<?php

require_once '../vendor/autoload.php';

$api = (new \BlockMatrix\EosRpc\ChainFactory)->api();

echo $api->getInfo() . PHP_EOL;
echo $api->getBlock("1337") . PHP_EOL;
echo $api->getBlockHeaderState("0016e48707b181d93117b07451d9837526eba34a9a37125689fb5a73a5d28a38") . PHP_EOL;
echo $api->getAccount("blockmatrix1") . PHP_EOL;
echo $api->getCode("eosio.token") . PHP_EOL;
echo $api->getTableRows("eosio", "eosio", "producers", ["limit" => 10]) . PHP_EOL;
echo $api->getCurrencyBalance("eosio.token", "eosdacserver") . PHP_EOL;
echo $api->getCurrencyStats("eosio.token", "EOS") . PHP_EOL;
echo $api->getAbi("eosio.token") . PHP_EOL;
echo $api->getRawCodeAndAbi("eosio.token") . PHP_EOL;
echo $api->getProducers(10) . PHP_EOL;
echo $api->abiJsonToBin("eosio.token", "transfer", ["blockmatrix1", "blockmatrix1", "7.0000 EOS", "Testy McTest"]) . PHP_EOL;
echo $api->abiBinToJson("eosio.token", "transfer", "10babbd94888683c10babbd94888683c701101000000000004454f53000000000c5465737479204d6354657374") . PHP_EOL;
echo $api->getRequiredKeys(
    [
        "expiration" => "2018-08-23T05.00.00",
        "ref_block_num" => 15078,
        "ref_block_prefix" => 1071971392,
        "max_net_usage_words" => 0,
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
    ]
);
echo $api->pushTransaction("2018-08-23T05:29:39", "15780", "90170226",
    [
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
        "signatures" => [
            "SIG_K1_KaGHyi59BRqfaDUK6424TYEWcUhWxAG7BLCgYC8vwYNgaHgGLpduTUbNQEsfL8xLzboK8W9T2X69bNpqozTQVCbRSNJWFd"
        ]
    ]
);
echo $api->pushTransactions(
    [
        [
            "compression" => "none",
            "transaction" => [
                "expiration" => "2018-08-23T06:27:26",
                "ref_block_num" => 22017,
                "ref_block_prefix" => 3920123292,
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
            "signatures" => [
                "SIG_K1_JzN9DnpyhKfjoef3C2TZBTPA5b6ftwuEBnBpvzkueVXThJ34PFFpUFgqyayfXjeLRc15JmZmDiMYAFX99hUgX8vkGAYcnx"
            ]
        ],
        [
            "compression" => "none",
            "transaction" => [
                "expiration" => "2018-08-23T06:27:26",
                "ref_block_num" => 22017,
                "ref_block_prefix" => 3920123292,
                "context_free_actions" => [],
                "actions" => [
                    [
                        "account" => "eosio.token",
                        "name" => "transfer",
                        "authorization" => [
                            [
                                "actor" => "tester",
                                "permission" => "active"
                            ]
                        ],
                        "data" => "000000005c95b1ca00000000007015d6881300000000000004454f53000000000c7465737465722d3e75736572"
                    ]
                ],
                "transaction_extensions" => []
            ],
            "signatures" => [
                "SIG_K1_KZ2M4AG59tptdRCpqbwzMQvBv1dce5btJCJiCVVy96fTGepApGXqJAwsi17g8AQdJjUQB4R62PprfdUdRYHGdBqK1z9Sx9"
            ]
        ]
    ]
);
