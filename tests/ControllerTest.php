<?php

use BlockMatrix\EosRpc\Adapter\Http\GuzzleAdapter;
use BlockMatrix\EosRpc\Adapter\Settings\DotenvAdapter;
use BlockMatrix\EosRpc\ChainController;
use BlockMatrix\EosRpc\Exception\HttpException;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Mockery as m;

class ControllerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    protected function getSettingsMock()
    {
        return m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->shouldReceive('rpcNode')
            ->andReturn('https://eosapi.blockmatrix.network/')
            ->getMock();
    }

    protected function getPsrValidResponse()
    {
        return m::mock(\GuzzleHttp\Psr7\Response::class)
            ->shouldReceive('getBody')
            ->andReturn('{"success":true}')
            ->getMock();
    }

    public function testFetchApi()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->getMock();

        $http = m::mock(Client::class);
        $api = new ChainController(new DotenvAdapter($settings), new GuzzleAdapter($http));

        $this->assertInstanceOf(ChainController::class, $api);
    }

    public function testGetWorks()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('get')
            ->andReturn($this->getPsrValidResponse())
            ->getMock();

        $api = new ChainController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $result = $api->getInfo();

        $this->assertJson($result);
    }

    /**
     * @expectedException BlockMatrix\EosRpc\Exception\HttpException
     */
    public function testHttpGetException()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('get')
            ->andThrow(new HttpException('cant connect to mothership'))
            ->getMock();

        $api = new ChainController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $response = $api->getInfo();
    }

    /**
     * @expectedException BlockMatrix\EosRpc\Exception\SettingsNotFoundException
     */
    public function testSettingsPathException()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->andThrow(new \Dotenv\Exception\InvalidPathException)
            ->getMock();

        $http = m::mock(Client::class);

        $api = new ChainController(new DotenvAdapter($settings), new GuzzleAdapter($http));
    }

    /**
     * @expectedException BlockMatrix\EosRpc\Exception\SettingsException
     */
    public function testSettingsException()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->andThrow(new \Exception)
            ->getMock();

        $http = m::mock(Client::class);

        $api = new ChainController(new DotenvAdapter($settings), new GuzzleAdapter($http));
    }
}
