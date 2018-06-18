<?php

require_once '../vendor/autoload.php';

$api = (new \BlockMatrix\EosRpc\ChainFactory)->api();

$info = $api->getInfo();

print_r($info);
