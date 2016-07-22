<?php
namespace Smarti\Metakocka\Resource\Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\ResponseBase;

/**
 * Class ListResponse
 * @package Smarti\Metakocka\Resource\Product
 */
class ListResponse extends ResponseBase
{
    /** @var bool */
    private $sales = null;

    /** @var bool */
    private $returnWarehauseStock = null;

    /** @var int */
    private $limit = 0;

    /** @var int */
    private $offset = 0;

    /** @var int */
    private $productListCount = 0;

    /** @var ItemResponse[] */
    private $productList = [];

    /**
     * @param \stdClass $data
     */
    public function parse(\stdClass $data)
    {
        $this->limit = (int)($data->limit ?? 0);
        $this->offset = (int)($data->offset ?? 0);
        $this->productListCount = (int)($data->product_list_count ?? 0);
        $this->returnWarehauseStock = DataFormat::parseBool($data->return_warehause_stock ?? '');
        $this->sales = DataFormat::parseBool($data->sales);

        $productList = $data->product_list ?? [];

        foreach ($productList as $product) {
            $productItem = new ItemResponse($product);

            $this->productList[] = $productItem;
        }
    }

    /**
     * @return boolean
     */
    public function isSales()
    {
        return $this->sales;
    }

    /**
     * @return boolean
     */
    public function isReturnWarehauseStock()
    {
        return $this->returnWarehauseStock;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getProductListCount()
    {
        return $this->productListCount;
    }

    /**
     * @return ItemResponse[]
     */
    public function getProductList()
    {
        return $this->productList;
    }
}