<?php

namespace Smarti\Metakocka;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Model\Product\DocumentRequest;
use Smarti\Metakocka\Model\Product\ItemRequest;
use Smarti\Metakocka\Model\Product\ItemResponse;
use Smarti\Metakocka\Model\Product\ListResponse;
use Smarti\Metakocka\Model\Product\SearchRequest;
use Smarti\Metakocka\Model\Product\SearchResponse;
use Smarti\Metakocka\Model\Sales\Order;
use Smarti\Metakocka\Resource\JsonMapper;
use Smarti\Metakocka\Resource\RequestInterface;
use Smarti\Metakocka\Model\Product\ListRequest;
use Smarti\Metakocka\Model\Sales\BillPdfRequest;
use Smarti\Metakocka\Model\Sales\BillRequest;
use Smarti\Metakocka\Model\Sales\BillResponse;
use stdClass;

/**
 * Class ApiClient
 * @package Smarti\Metakocka
 */
class ApiClient
{
    protected int $companyID;
    protected string $secretKey;
    protected bool $debugMode;

    /**
     * Client constructor.
     *
     * @param int    $companyID
     * @param string $secretKey
     * @param bool   $debugMode
     *
     * @throws Exception
     */
    public function __construct(int $companyID, string $secretKey, bool $debugMode = false)
    {
        if (empty($companyID) || empty($secretKey)) {
            throw new Exception('CompanyID and ClientSecret parameters are required');
        }

        $this->companyID = $companyID;
        $this->secretKey = $secretKey;
        $this->debugMode = $debugMode;
    }

    /**
     * Test login here
     *
     * @return bool
     */
    public function validate(): bool
    {
        return true;
    }

    /**
     * @param SearchRequest $searchRequest
     * @param bool          $retrieveAll
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function search(SearchRequest $searchRequest, bool $retrieveAll = false): stdClass
    {
        $results = [];

        do {
            $response = $this->requestData('', $searchRequest, 'search');

            if (((int) $response->result_count) > 0) {
                $results = [
                    ...$results,
                    ...$response->result,
                ];

                $searchRequest->setOffset(
                    $searchRequest->getOffset() + $searchRequest->getLimit()
                );
            }
        } while (
            $retrieveAll &&
            $searchRequest->getOffset() < $response->result_all_records
        );

        $response->result = $results;

        return $response;
    }

    /**
     * @param string $documentType
     * @param string $documentId
     *
     * @return stdClass
     * @throws GuzzleException
     */
    public function getDocument(string $documentType, string $documentId): stdClass
    {
        return $this->requestData(
            '',
            (new DocumentRequest())
                ->setDocType($documentType)
                ->setDocId($documentId),
            'get_document'
        );
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
                'base_uri' => $this->debugMode ? "https://devmainsi.metakocka.si/rest/eshop/v1/$type/" :
                    "https://main.metakocka.si/rest/eshop/v1/$type/",
            ]
        );
    }

    /**
     * @param string                $resource
     * @param RequestInterface|null $data
     * @param string                $type
     *
     * @return ResponseInterface|null
     * @throws GuzzleException
     */
    private function request(
        string $resource,
        ?RequestInterface $data = null,
        string $type = 'json'
    ): ?ResponseInterface {
        $httpClient = $this->getHttpClient($type);

        $postData = $data->prepare();
        $postData["secret_key"] = $this->secretKey;
        $postData["company_id"] = $this->companyID;

        if ($resource) {
            $resource = './' . $resource;
        }

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
        $response = $this->request($resource, $data, 'pdf');

        return $response->getBody()->getContents();
    }

    /**
     * @param string                $resource
     * @param RequestInterface|null $data
     * @param string                $type
     *
     * @return stdClass
     * @throws GuzzleException
     */
    private function requestData(string $resource, ?RequestInterface $data = null, string $type = 'json'): stdClass
    {
        $response = $this->request($resource, $data, $type);
        $contents = $response->getBody()->getContents();
        $responseObject = json_decode($contents);

        $this->verifyResponse($responseObject);

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