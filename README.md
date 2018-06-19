# The PHP SDK for the EOS RPC API

This is is a work in progress, the intention is to wrap the Chain API in a PHP SDK.

## Background

You can check out the [official docs](https://eosio.github.io/eos/group__eosiorpc.html).

## Installing

```php
composer require BlockMatrixNetwork/php-eos-rpc-sdk
```

## Configuration

Update the dot env `.env` with your favourite RPC API host.

## Usage

There is a shiny factory method to auto instantiate all dependencies: 

```php
$api = (new ChainFactory)->api();
```

So far, Chain API methods are covered.

### Get Info

Get latest information related to a node

```php
echo $api->getInfo();

{
  "server_version": "db031363",
  "chain_id": "aca376f206b8fc25a6ed44dbdc66547c36c6c33e3a119ffbeaef943642f0e906",
  "head_block_num": 1380988,
  "last_irreversible_block_num": 1380657,
  "last_irreversible_block_id": "0015113163cbe7676c4e56d1758a1ce95e47fa645827b9202de5753031d36b8b",
  "head_block_id": "0015127c94676db3da55ec66210952db7f4db35b0e731abefff1562c201a0666",
  "head_block_time": "2018-06-18T15:38:45.000",
  "head_block_producer": "eoscannonchn",
  "virtual_block_cpu_limit": 200000000,
  "virtual_block_net_limit": 1048576000,
  "block_cpu_limit": 199900,
  "block_net_limit": 1048576
}
```

### Get Block

Get information related to a block

```php
echo $api->getBlock("1337");

{
  "timestamp": "2018-06-09T12:09:21.500",
  "producer": "eosio",
  "confirmed": 0,
  "previous": "00000538b374c1cbfaeed7253ad3075ddc72a28f0a0515301fc1bbed675f2316",
  "transaction_mroot": "0000000000000000000000000000000000000000000000000000000000000000",
  "action_mroot": "bcb9763baa3bbf98ed36379b4be0ecb2d9cd21c75df01729c63b2b021001c10c",
  "schedule_version": 0,
  "new_producers": null,
  "header_extensions": [
    
  ],
  "producer_signature": "SIG_K1_K5jWf36t6j454Hb2fGuV37YTwMTvuQ51ZPBtpru8Ud2axtMTEauWyvtpJuTpnvqzReUndDgEDXvoeEP4jdj2bpnYKBt6g2",
  "transactions": [
    
  ],
  "block_extensions": [
    
  ],
  "id": "00000539d17a03af7126e073be4c4d99a72b7f58793cf2c87b9bfd41b6c711fb",
  "block_num": 1337,
  "ref_block_prefix": 1944069745
}
```

### Get Account

Get information related to an account

```php
$api->getAccount("blockmatrix1");

{
  "account_name": "blockmatrix1",
  "head_block_num": 1486555,
  "head_block_time": "2018-06-19T06:18:29.500",
  "privileged": false,
  "last_code_update": "1970-01-01T00:00:00.000",
  "created": "2018-06-10T13:04:15.500",
  "ram_quota": 8146,
  "net_weight": 20000,
  "cpu_weight": 20000,
  "net_limit": {
    "used": 464,
    "available": 909375,
    "max": 909839
  },
  "cpu_limit": {
    "used": 3654,
    "available": 169882,
    "max": 173536
  },
  "ram_usage": 3329,
  "permissions": [
    {
      "perm_name": "active",
      "parent": "owner",
      "required_auth": {
        "threshold": 1,
        "keys": [
          {
            "key": "EOS5CBFDJvqH9zMtmpQd8uzouRjMkwX7vSHyooRLu2bAzjQCM9WLd",
            "weight": 1
          }
        ],
        "accounts": [
          
        ],
        "waits": [
          
        ]
      }
    },
    {
      "perm_name": "owner",
      "parent": "",
      "required_auth": {
        "threshold": 1,
        "keys": [
          {
            "key": "EOS6kGHnZn9pxsLH1D87RomMrpauRBghBLEptmUz8iYzVRP7kBk9B",
            "weight": 1
          }
        ],
        "accounts": [
          
        ],
        "waits": [
          
        ]
      }
    }
  ],
  "total_resources": {
    "owner": "blockmatrix1",
    "net_weight": "2.0000 EOS",
    "cpu_weight": "2.0000 EOS",
    "ram_bytes": 8146
  },
  "self_delegated_bandwidth": null,
  "refund_request": null,
  "voter_info": null
}
```

### Get Code

Fetch smart contract code

```php
echo $api->getCode("eosio");

{
  "account_name": "eosio",
  "code_hash": "254247a18af399e237f47ea63e7b5970a8f9d6819150efe443d8e711895915ed",
  "wast": "(module...
  *snip*
}
```

### Get Table Rows

Fetch smart contract data from an account

```php
echo $api->getTableRows("eosio", "eosio", "producers", 10);

{
  "rows": [
    {
      "owner": "123singapore",
      "total_votes": "7636484940846242.00000000000000000",
      "producer_key": "EOS71UbkZzuz55WNBpsEVQzkXrZAJ2XyLoQiEcS9WKwbYambhFxWb",
      "is_active": 1,
      "url": "http:\/\/eos.vote",
      "unpaid_blocks": 0,
      "last_claim_time": 0,
      "location": 0
    },
    ...
    *snip*
}
```

## Tests

Project has 100% test coverage, because OCD. 

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

All contributions are welcome! Just fire up a PR, make sure you include new tests 
to maintain 100% coverage and the code style must be PSR-2 compliant: 

```php
vendor/bin/php-cs-fixer fix --verbose
```

## License

Free for everyone!

MIT License
