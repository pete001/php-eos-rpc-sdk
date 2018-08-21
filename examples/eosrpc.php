<?php

require_once '../vendor/autoload.php';

$chapi = (new \BlockMatrix\EosRpc\ChainFactory)->api();
$walapi = (new \BlockMatrix\EosRpc\WalletFactory)->api();
$eos = (new \BlockMatrix\EosRpc\EosRpc($chapi, $walapi));


echo ($walletPassword = trim($walapi->create('testwallet'), '\"')) . PHP_EOL;
$eos->setWalletInfo('testwallet', $walletPassword);
echo $walapi->importKey(['testwallet', '5Jmsawgsp1tQ3GD6JyGCwy1dcvqKZgX6ugMVMdjirx85iv5VyPR']) . PHP_EOL;
echo $eos->transfer('user', 'tester', '1.0000 EOS', 'memo') . PHP_EOL;
echo $eos->pushAction('eosio', 'buyram', ['payer'=>'tester','receiver'=>'tester','quant'=>'1.0000 EOS'],['actor'=>'tester','permission'=>'active']) . PHP_EOL;
echo $eos->pushAction('eosio', 'sellram', ['tester', 10240],['actor'=>'tester','permission'=>'active']) . PHP_EOL;
$keyPair = $eos->createKeyPair('K1');
echo "publicKey : $keyPair[0]\nprivateKey : $keyPair[1]\n";
