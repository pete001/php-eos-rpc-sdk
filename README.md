# The PHP SDK for the EOS RPC API

A PHP wrapper for the EOS Chain/Wallet RPC API.

## Background

You can check out the [RPC API reference](https://developers.eos.io/eosio-nodeos/reference) but 
beware that some of the newer methods are missing.
Wallet RPC APIs are implemented as [v1.1.0 of RPC API reference](https://developers.eos.io/eosio-nodeos/v1.1.0/reference).
Also, some of the examples in those docs use outdated syntax.

## Installing

```php
composer require manamine/php-eos-rpc-sdk
```

## Configuration

Create a dotenv `.env` file in the project root, with your favorite RPC API host and KEOSD. You can use
`.env.example` as a template:

```
cp .env.example .env
```

## Usage

There is a shiny factory method to auto instantiate all dependencies: 

```php
$api = (new ChainFactory)->api();
$walapi = (new WalletFactory)->api();
$eos = (new EosRpc($api, $walapi));
```

## Examples

To get you started, there is a simple example runner which covers all API commands.

Just run this via cli to see example output for all commands:

```
cd examples
php chain.php
php wallet.php
php eosrpc.php
```

## API Methods

Almost Chain/Wallet API methods are covered.

## Chain APIs

### Get Info

Get latest information related to a node

```php
echo $api->getInfo();
```

### Get Block

Get information related to a block

```php
echo $api->getBlock("1337");
```

### Get Block Header State

Get information related to a block header state

```php
echo $api->getBlockHeaderState("0016e48707b181d93117b07451d9837526eba34a9a37125689fb5a73a5d28a38");
```

### Get Account

Get information related to an account

```php
$api->getAccount("blockmatrix1");
```

### Get Code

Fetch smart contract code

```php
echo $api->getCode("eosio.token");
```

### Get Table Rows

Fetch smart contract data from an account

```php
echo $api->getTableRows("eosio", "eosio", "producers", ["limit" => 10]);
```

### Get Currency Balance

Fetch currency balance(s) for an account

```php
echo $api->getCurrencyBalance("eosio.token", "eosdacserver");
```

### Get Currency Stats

Fetch stats for a currency

```php
echo $api->getCurrencyStats("eosio.token", "EOS");
```

### Get ABI

Get an account ABI

```php
echo $api->getAbi("eosio.token");
```

### Get Raw Code and ABI

Get raw code and ABI

```php
echo $api->getRawCodeAndAbi("eosio.token");
```

### Get Producers

List the producers

```php
echo $api->getProducers(10);
```

### ABI JSON To Bin

Serialize json to binary hex

```php
echo $api->abiJsonToBin("eosio.token", "transfer", ["blockmatrix1", "blockmatrix1", "7.0000 EOS", "Testy McTest"]);
```

### ABI Bin To JSON

Serialize back binary hex to json

```php
echo $api->abiBinToJson("eosio.token", "transfer", "10babbd94888683c10babbd94888683c701101000000000004454f53000000000c5465737479204d6354657374");
```

### Get Required Keys

Get the required keys needed to sign a transaction

```php
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
```

### Push Transaction

Push a transaction

```php
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
```

### Push Transactions

Push transactions

```php
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
```

## Wallet APIs

### Create

Creates a new wallet with the given name

```php
echo $walapi->create("testwallet");
```

### Open

Opens an existing wallet of the given name

```php
echo $walapi->open("testwallet");
```

### Lock

Locks an existing wallet of the given name

```php
echo $walapi->lock("testwallet");
```

### Lock All

Locks all existing wallets

```php
echo $walapi->lockAll();
```

### Unlock

Unlocks a wallet with the given name and password

```php
echo $walapi->unlock(["testwallet", "PW5Jb8RAZP6CBjjMLPser3T8i8k9hZXZkMBJ8kb1p6f6hAg2n68jY"]);
```

### Import Key

Imports a private key to the wallet of the given name

```php
echo $walapi->importKey(["testwallet", "5Jmsawgsp1tQ3GD6JyGCwy1dcvqKZgX6ugMVMdjirx85iv5VyPR"]);
```

### Remove Key

Removes a key pair from the wallet of the given name

```php
echo $walapi->removeKey(["testwallet", "PW5Jb8RAZP6CBjjMLPser3T8i8k9hZXZkMBJ8kb1p6f6hAg2n68jY", "EOS7ijWCBmoXBi3CgtK7DJxentZZeTkeUnaSDvyro9dq7Sd1C3dC4"]);
```

### Create Key

Creates a key pair and import

```php
echo $walapi->createKey(["testwallet", "K1"]);
```

### List Wallets

Lists all wallets

```php
echo $walapi->listWallets();
```

### List Keys

Lists all key pairs from the wallet of the given name and password

```php
echo $walapi->listKeys(["testwallet", "PW5Jb8RAZP6CBjjMLPser3T8i8k9hZXZkMBJ8kb1p6f6hAg2n68jY"]);
```

### Get Public Keys

Lists all public keys across all wallets

```php
echo $walapi->getPublicKeys();
```

### Set Timeout

Sets wallet auto lock timeout (in seconds)

```php
echo $walapi->setTimeout(60);
```

### Sign Transaction

Signs a transaction

```php
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
```

## EOS Wrapper APIs

### Prerequisites

Need to set wallet name and password

```php
$eos->setWalletInfo("testwallet", "PW5Jb8RAZP6CBjjMLPser3T8i8k9hZXZkMBJ8kb1p6f6hAg2n68jY");
```

### Push Transaction

Push a transaction

```php
echo $eos->pushTransaction(
    [
        [
            "account" => "eosio.token",
            "name" => "transfer",
            "authorization" => [
                [
                    "actor" => "user",
                    "permission" => "active"
                ]
            ],
            "data" => [
                "from" => "user",
                "to" => "tester",
                "quantity" => "1.0000 EOS",
                "memo" => "memo"
            ]
        ]
    ]
);
```

### Make Transaction

Make a transaction (useful for pushTransactions)

```php
$trx = $eos->makeTransaction(
    [
        [
            "account" => "eosio.token",
            "name" => "transfer",
            "authorization" => [
                [
                    "actor" => "user",
                    "permission" => "active"
                ]
            ],
            "data" => [
                "from" => "user",
                "to" => "tester",
                "quantity" => "1.0000 EOS",
                "memo" => "memo"
            ]
        ]
    ]
);
```

### Push Transactions

Push transactions

```php
$trx_ids = $eos->pushTransactions(
    [
        $eos->makeTransaction(
            [
                [
                    "account" => "eosio.token",
                    "name" => "transfer",
                    "authorization" => [
                        [
                            "actor" => "user",
                            "permission" => "active"
                        ]
                    ],
                    "data" => [
                        "from" => "user",
                        "to" => "tester",
                        "quantity" => "1.0000 EOS",
                        "memo" => "memo"
                    ]
                ]
            ]
        ),
        $eos->makeTransaction(
            [
                [
                    "account" => "eosio.token",
                    "name" => "transfer",
                    "authorization" => [
                        [
                            "actor" => "tester",
                            "permission" => "active"
                        ]
                    ],
                    "data" => [
                        "from" => "tester",
                        "to" => "user",
                        "quantity" => "0.5000 EOS",
                        "memo" => "memo"
                    ]
                ]
            ]
        )
    ]
);
foreach ($trx_ids as $key => $value) {
    echo $trx_ids[$key]['transaction_id'] . PHP_EOL;
}
```

### Push Action

Push an action

```php
echo $eos->pushAction("eosio", "buyram", ["payer"=>"tester","receiver"=>"tester","quant"=>"1.0000 EOS"], ["actor"=>"tester","permission"=>"active"]);
```

### Transfer

Transfers token

```php
echo $eos->transfer("user", "tester", "1.0000 EOS", "memo");
```

### Create Key Pair

Creates a key pair and returns

```php
$keyPair = $eos->createKeyPair("K1");
echo "$keyPair[0], $keyPair[1]";
```

## Tests

To run the test suites, simply execute:

```php
vendor/bin/phpunit
```

If you wanna get fancy and check code coverage:

```php
vendor/bin/phpunit --coverage-html tests/coverage
```

If you're really bored, you might wanna run some static analysis:

```php
vendor/bin/phpmetrics --report-html="tests/static" .
```

## Contributing

All contributions are welcome! Just fire up a PR, make sure your code style is PSR-2 compliant: 

```php
vendor/bin/php-cs-fixer fix --verbose
```

## License

Free for everyone!

MIT License
