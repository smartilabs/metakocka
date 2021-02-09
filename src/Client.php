<?php

namespace Smarti\Metakocka;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\Product\ItemRequest;
use Smarti\Metakocka\Resource\Product\ItemResponse;
use Smarti\Metakocka\Resource\Product\ListResponse;
use Smarti\Metakocka\Resource\RequestInterface;
use Smarti\Metakocka\Resource\Product\ListRequest;
use Smarti\Metakocka\Resource\Sales\BillPdfRequest;
use Smarti\Metakocka\Resource\Sales\BillRequest;
use Smarti\Metakocka\Resource\Sales\BillResponse;
use stdClass;

/**
 * Class Client
 * @package Smarti\Metakocka
 */
class Client
{
    protected int $companyID;
    protected string $secretKey;

    /**
     * Client constructor.
     *
     * @param int    $companyID
     * @param string $secretKey
     *
     * @throws Exception
     */
    public function __construct(int $companyID, string $secretKey)
    {
        if (empty($companyID) || empty($secretKey)) {
            throw new Exception('CompanyID and ClientSecret parameters are required');
        }

        $this->companyID = $companyID;
        $this->secretKey = $secretKey;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return true;
    }

    /**
     * @param ListRequest $data
     *
     * @return ListResponse
     * @throws Exception
     * @throws GuzzleException
     */
    public function getProductList(ListRequest $data): ListResponse
    {
        return new ListResponse(
            $this->requestData('product_list', $data)
        );
    }

    /**
     * @param ItemRequest $data
     *
     * @return ItemResponse
     * @throws InvalidDataException
     * @throws Exception
     * @throws GuzzleException
     */
    public function createProduct(ItemRequest $data): ItemResponse
    {
        $data->validate();;

        return new ItemResponse(
            $this->requestData('product_add', $data)
        );
    }

    /**
     * @param BillRequest $data
     *
     * @return BillResponse
     * @throws InvalidDataException
     * @throws GuzzleException
     */
    public function createBill(BillRequest $data)
    {
        $data->validate();

        return new BillResponse(
            $this->requestData('put_sales_bill', $data)
        );
    }

    /**
     * @param BillPdfRequest $data
     *
     * @return string|null
     * @throws GuzzleException
     * @throws InvalidDataException
     */
    public function getBillPdf(BillPdfRequest $data): ?string
    {
        $data->validate();

        return $this->requestPdf('report_bill', $data, true);
    }

    /**
     * @param string $type
     *
     * @return GuzzleClient
     */
    private function getHttpClient($type = 'json'): GuzzleClient
    {
        return new GuzzleClient(
            [
                'base_uri' => "https://main.metakocka.si/rest/eshop/v1/$type/",
            ]
        );
    }

    /**
     * @param string                $resource
     * @param RequestInterface|null $data
     * @param bool                  $pdf
     *
     * @return ResponseInterface|null
     * @throws GuzzleException
     */
    private function request(string $resource, ?RequestInterface $data = null, bool $pdf = false): ?ResponseInterface
    {
        $httpClient = $this->getHttpClient($pdf ? 'pdf' : 'json');

        $postData = $data->prepare();
        $postData["secret_key"] = $this->secretKey;
        $postData["company_id"] = $this->companyID;

        try {
            return $httpClient->request(
                'POST',
                $resource,
                [
                    'body' => json_encode($postData),
                    'headers' => [
                        'content-type' => 'application/json',
                    ],
                ]
            );
        } catch (ClientException $e) {
            var_dump($e->getMessage());
        }

        return null;
    }

    /**
     * @param string                $resource
     * @param RequestInterface|null $data
     * @param bool                  $pdf
     *
     * @return string|null
     * @throws GuzzleException
     */
    private function requestPdf(string $resource, ?RequestInterface $data = null, bool $pdf = false): ?string
    {
        $response = $this->request($resource, $data, true);

        return $response->getBody()->getContents();
    }

    /**
     * @param string                $resource
     * @param RequestInterface|null $data
     *
     * @return stdClass
     * @throws GuzzleException
     */
    private function requestData(string $resource, ?RequestInterface $data = null): stdClass
    {
        $response = $this->request($resource, $data);
        $contents = $response->getBody()->getContents();
        $responseObject = json_decode($contents);

        $this->verifyResponse($responseObject);

        var_dump($responseObject);
        die;

        return $responseObject;
    }

    /**
     * @param stdClass $response
     *
     * @throws Exception
     */
    public function verifyResponse(stdClass $response)
    {
        if (($code = $response->opr_code) != 0) {
            $desc = isset($response->opr_desc) ? $response->opr_desc : null;
            $desc = $desc ?:
                (isset($response->opr_desc_app) ? $response->opr_desc_app :
                    "Unknown exception while connecting to API ($code)");

            throw new Exception($desc);
        }
    }
}