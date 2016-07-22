<?php
namespace Smarti\Metakocka;

use GuzzleHttp\Exception\ClientException;
use Smarti\Metakocka\Resource\Product\ListResponse;
use Smarti\Metakocka\Resource\RequestInterface;
use Smarti\Metakocka\Resource\Product\ListRequest;

class Client
{
    /** @var int */
    protected $companyID = null;

    /** @var string */
    protected $secretKey = null;

    /**
     * Client constructor.
     * @param int $companyID
     * @param string $secretKey
     *
     * @throws \Exception
     */
    public function __construct(int $companyID, string $secretKey)
    {
        if (empty($companyID) || empty($secretKey))
            throw new \Exception('CompanyID and ClientSecret parameters are required');

        $this->companyID = $companyID;
        $this->secretKey = $secretKey;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * @param ListRequest $data
     * @return ListResponse
     */
    public function getProductList(ListRequest $data) : ListResponse
    {
        $responseData = $this->request('product_list', $data);

        return new ListResponse($responseData);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getHttpClient()
    {
        return new \GuzzleHttp\Client([
            'base_uri' => 'https://main.metakocka.si/rest/eshop/v1/json/',
        ]);
    }

    /**
     * @param string $resource
     * @param RequestInterface|null $data
     * @return bool|mixed
     */
    private function request(string $resource, RequestInterface $data = null)
    {
        $httpClient = $this->getHttpClient();

        $postData = $data->prepare();
        $postData["secret_key"] = $this->secretKey;
        $postData["company_id"] = $this->companyID;

        try {
            $response = $httpClient->request('POST', $resource, [
                'body' => json_encode($postData),
                'headers' => [
                    'content-type' => 'application/json',
                    'accept' => 'application/json',
                ],
            ]);

            $contents = $response->getBody()->getContents();

            $responseObject = json_decode($contents);

            $this->verifyResponse($responseObject);

            return $responseObject;
        } catch (ClientException $e) {
            var_dump($e->getMessage());
            die;
        }
    }

    /**
     * @param \stdClass $response
     * @throws \Exception
     */
    private function verifyResponse(\stdClass $response)
    {
        if (($code = $response->opr_code) != 0)
            throw new \Exception($response->oprDesc ?? "Unknown exception while connection to API ($code)");
    }
}