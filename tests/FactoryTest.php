<?php

use BlockMatrix\EosRpc\ChainController;
use BlockMatrix\EosRpc\ChainFactory;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testApiReturn()
    {
        $api = (new ChainFactory)->api('.env.example');
        $this->assertInstanceOf(ChainController::class, $api);
    }
}
