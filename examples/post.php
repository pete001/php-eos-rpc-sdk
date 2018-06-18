<?php

require_once '../vendor/autoload.php';

$api = (new \BlockMatrix\EosRpc\ChainFactory)->api();

$info = $api->getBlock("1337");

print_r($info);
