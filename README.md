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

So far there is 1 lonely method:

### Get Info

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

All contributions are welcome! Just fire up a PR and pinky swear the code passes the tests, has new tests 
written to maintain 100% coverage and make sure its PSR-2 compliant: 

```php
vendor/bin/php-cs-fixer fix --verbose
```

## License

Free for everyone!

MIT License
