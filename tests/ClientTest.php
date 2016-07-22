<?php
use Smarti\Metakocka\Client;
use Smarti\Metakocka\Resource\Product;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @var Client */
    protected $client;

    protected function setUp()
    {
        $companyID = 123;
        $secretKey = 'secret_key';

        $this->client = new Client($companyID, $secretKey);
    }

    protected function tearDown()
    {
        unset($this->client);
    }

    /**
     * @expectedException \Exception
     *
     * We can't have instance without config
     */
    public function testInstance()
    {
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
     */
    public function testGetProductList()
    {
        $data = new Product\ListRequest();
        $this->assertInstanceOf(Product\ListResponse::class, $this->client->getProductList($data));
    }

}