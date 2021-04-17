<?php
namespace Smarti\Metakocka\Model\Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class ListRequest implements RequestInterface
{
    private bool $sales = true;
    private bool $returnWarehauseStock = true;
    private int $offset = 0;
    private int $limit = 0;

    /**
     * @return bool
     */
    public function isSales(): bool
    {
        return $this->sales;
    }

    /**
     * @param bool $sales
     *
     * @return ListRequest
     */
    public function setSales(bool $sales): ListRequest
    {
        $this->sales = $sales;

        return $this;
    }

    /**
     * @return bool
     */
    public function isReturnWarehauseStock(): bool
    {
        return $this->returnWarehauseStock;
    }

    /**
     * @param bool $returnWarehauseStock
     *
     * @return ListRequest
     */
    public function setReturnWarehauseStock(bool $returnWarehauseStock): ListRequest
    {
        $this->returnWarehauseStock = $returnWarehauseStock;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return ListRequest
     */
    public function setOffset(int $offset): ListRequest
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return ListRequest
     */
    public function setLimit(int $limit): ListRequest
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return array
     */
    public function prepare(): array
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
    public function validate():bool
    {
        return true;
    }
}