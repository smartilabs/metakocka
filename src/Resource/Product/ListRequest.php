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
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @param bool $sales
     */
    public function setSales(bool $sales)
    {
        $this->sales = $sales;
    }

    /**
     * @param bool $returnWarehauseStock
     */
    public function setReturnWarehauseStock(bool $returnWarehauseStock)
    {
        $this->returnWarehauseStock = $returnWarehauseStock;
    }

    /**
     * @return array
     */
    public function prepare() : array
    {
        return [
            'sales' => DataFormat::formatBool($this->sales),
            'return_warehause_stock' => DataFormat::formatBool($this->returnWarehauseStock),
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}