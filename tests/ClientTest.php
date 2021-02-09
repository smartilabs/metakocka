<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Smarti\Metakocka\Client;
use Smarti\Metakocka\Resource\Product;

class ClientTest extends TestCase
{
    /** @var Client */
    protected Client $client;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $companyID = 3518;
        $secretKey = '1909df15-ead8-4c32-9f74-210c79678973';

        $this->client = new Client($companyID, $secretKey);
    }

    /**
     *
     */
    protected function tearDown(): void
    {
        unset($this->client);
    }

    /**
     *
     *
     * We can't have instance without config
     */
    public function testInstance()
    {
        $this->expectException(\Exception::class);// We can't have instance without config
        new Client(0, '');
    }

    /**
     * Is login valid
     */
    public function testValidate()
    {
        $this->assertTrue($this->client->validate());
    }

    /**
     * We need to get Product\ListResponse
     * @throws GuzzleException
     */
    public function testGetProductList()
    {
        $data = new Product\ListRequest();
        $this->assertInstanceOf(Product\ListResponse::class, $this->client->getProductList($data));
    }

    /**
     * @throws Exception
     */
    public function testVerifyResponseUnknownException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Unknown exception while connecting to API (-1)");
        $response = new \stdClass();
        $response->opr_code = -1;

        $this->client->verifyResponse($response);
    }

    public function testVerifyResponseOprDesc()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Test");

        $response = new \stdClass();
        $response->opr_code = -1;
        $response->opr_desc = 'Test';

        $this->client->verifyResponse($response);
    }

    public function testVerifyResponseOprDescApp()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Test");
        $response = new \stdClass();
        $response->opr_code = -1;
        $response->opr_desc_app = 'Test';

        $this->client->verifyResponse($response);
    }
}