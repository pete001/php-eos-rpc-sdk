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
// TO BE UPDATED in detail
echo $api->getRequiredKeys($transaction, $available_keys);
```

### Push Transaction

Push a transaction

```php
// TO BE UPDATED in detail
echo $api->pushTransaction($expiration, $ref_block_num, $ref_block_prefix, $extra);
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
// TO BE UPDATED in detail
echo $walapi->signTransaction($txn, $keys, $id);
```

## EOS Wrapper APIs

### Prerequisites

Need to set wallet name and password

```php
$eos->setWalletInfo("testwallet", "PW5Jb8RAZP6CBjjMLPser3T8i8k9hZXZkMBJ8kb1p6f6hAg2n68jY");
```

### Transfer

Transfers token

```php
echo $eos->transfer("user", "tester", "1.0000 EOS", "memo");
```

### Push Action

Push an action

```php
echo $eos->pushAction("eosio", "buyram", ["payer"=>"tester","receiver"=>"tester","quant"=>"1.0000 EOS"], ["actor"=>"tester","permission"=>"active"]);
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
