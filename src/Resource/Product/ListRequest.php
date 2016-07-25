<?php
namespace Smarti\Metakocka\Resource\Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class ListRequest implements RequestInterface
{
    /** @var bool */
    private $sales = true;

    /**
     * @var bool
     */
    private $returnWarehauseStock = true;

    /**
     * @var int
     */
    private $offset = 0;

    /** @var int */
    private $limit = 0;

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @param bool $sales
     */
    public function setSales($sales)
    {
        $this->sales = $sales;
    }

    /**
     * @param bool $returnWarehauseStock
     */
    public function setReturnWarehauseStock($returnWarehauseStock)
    {
        $this->returnWarehauseStock = $returnWarehauseStock;
    }

    /**
     * @return array
     */
    public function prepare()
    {
        return [
            'sales' => DataFormat::formatBool($this->sales),
            'return_warehause_stock' => DataFormat::formatBool($this->returnWarehauseStock),
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    /**
     * No required params
     * @return bool
     */
    public function validate()
    {
        return true;
    }
}