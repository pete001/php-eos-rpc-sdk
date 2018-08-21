<?php

require_once '../vendor/autoload.php';

$walapi = (new \BlockMatrix\EosRpc\WalletFactory)->api();


echo $walletPassword = trim($walapi->create('testwallet'), '\"') . PHP_EOL;
echo $walapi->open('testwallet') . PHP_EOL;
echo $walapi->lock('testwallet') . PHP_EOL;
echo $walapi->lockAll() . PHP_EOL;
echo $walapi->unlock(['testwallet', $walletPassword]) . PHP_EOL;
echo $walapi->importKey(['testwallet', '5Jmsawgsp1tQ3GD6JyGCwy1dcvqKZgX6ugMVMdjirx85iv5VyPR']) . PHP_EOL;
echo $walapi->removeKey(['testwallet', $walletPassword, 'EOS7ijWCBmoXBi3CgtK7DJxentZZeTkeUnaSDvyro9dq7Sd1C3dC4']) . PHP_EOL;
echo $walapi->createKey('testwallet', 'K1') . PHP_EOL;
echo $walapi->listWallets() . PHP_EOL;
echo $walapi->listKeys(['testwallet', $walletPassword]) . PHP_EOL;
echo $walapi->getPublicKeys() . PHP_EOL;
echo $walapi->setTimeout(60) . PHP_EOL;
//echo $walapi->signTransaction();
