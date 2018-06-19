<?php

require_once '../vendor/autoload.php';

$api = (new \BlockMatrix\EosRpc\ChainFactory)->api();

echo $api->getBlock("1337") . PHP_EOL;
echo $api->getAccount("blockmatrix1") . PHP_EOL;
echo $api->getCode("eosio") . PHP_EOL;
echo $api->getTableRows("eosio", "eosio", "producers", 10) . PHP_EOL;

