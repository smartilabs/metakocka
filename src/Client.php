<?php
namespace Smarti\Metakocka;

use GuzzleHttp\Exception\ClientException;
use Smarti\Metakocka\Resource\Product\ItemRequest;
use Smarti\Metakocka\Resource\Product\ItemResponse;
use Smarti\Metakocka\Resource\Product\ListResponse;
use Smarti\Metakocka\Resource\RequestInterface;
use Smarti\Metakocka\Resource\Product\ListRequest;
use Smarti\Metakocka\Resource\Sales\BillPdfRequest;
use Smarti\Metakocka\Resource\Sales\BillRequest;
use Smarti\Metakocka\Resource\Sales\BillResponse;

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
    public function __construct($companyID, $secretKey)
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
    public function getProductList(ListRequest $data)
    {
        $responseData = $this->request('product_list', $data);

        return new ListResponse($responseData);
    }

    /**
     * @param ItemRequest $data
     * @return ItemResponse
     */
    public function createProduct(ItemRequest $data)
    {
        $data->validate();
        $responseData = $this->request('product_add', $data);

        return new ItemResponse($responseData);
    }

    /**
     * @param BillRequest $data
     * @return BillResponse
     */
    public function createBill(BillRequest $data)
    {
        $data->validate();
        $responseData = $this->request('put_sales_bill', $data);

        return new BillResponse($responseData);
    }

    /**
     * @param BillPdfRequest $data
     * @return bool|mixed
     * @throws Exception\InvalidDataException
     */
    public function getBillPdf(BillPdfRequest $data)
    {
        $data->validate();
        $responseData = $this->request('report_bill', $data, true);

        return $responseData;
    }

    /**
     * @param string $type
     * @return \GuzzleHttp\Client
     */
    private function getHttpClient($type = 'json')
    {
        return new \GuzzleHttp\Client([
            'base_uri' => "https://main.metakocka.si/rest/eshop/v1/$type/",
        ]);
    }

    /**
     * @param string $resource
     * @param RequestInterface|null $data
     * @param bool $pdf
     * @return mixed|string
     * @throws \Exception
     */
    private function request($resource, $data = null, $pdf = false)
    {
        $httpClient = $this->getHttpClient($pdf ? 'pdf' : 'json');

        $postData = $data->prepare();
        $postData["secret_key"] = $this->secretKey;
        $postData["company_id"] = $this->companyID;

        try {
            $response = $httpClient->request('POST', $resource, [
                'body' => json_encode($postData),
                'headers' => [
                    'content-type' => 'application/json',
//                    'accept' => 'application/json',
                ],
            ]);

            $contents = $response->getBody()->getContents();

            if ($pdf)
                return $contents;

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
    public function verifyResponse(\stdClass $response)
    {
        if (($code = $response->opr_code) != 0) {
            $desc = isset($response->opr_desc) ? $response->opr_desc : null;
            $desc = $desc ?:
                (isset($response->opr_desc_app) ? $response->opr_desc_app :
                    "Unknown exception while connecting to API ($code)");

            throw new \Exception($desc);
        }
    }
}