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
echo $api->getProducers(10) . PHP_EOL;
echo $api->abiJsonToBin("eosio.token", "transfer", ["blockmatrix1", "blockmatrix1", "7.0000 EOS", "Testy McTest"]) . PHP_EOL;
echo $api->abiBinToJson("eosio.token", "transfer", "10babbd94888683c10babbd94888683c701101000000000004454f53000000000c5465737479204d6354657374") . PHP_EOL;

