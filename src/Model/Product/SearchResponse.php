<?php

namespace Smarti\Metakocka\Model \Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\ResponseBase;

/**
 * Class ListResponse
 * @package Smarti\Metakocka\Resource\Product
 */
class SearchResponse extends ResponseBase
{
    protected int $resultAllRecords = 0;
    protected int $resultCount = 0;
    protected int $limit = 0;
    protected int $offset = 0;

    /** @var SearchResult[] */
    protected array $result = [];

    /**
     * @return int
     */
    public function getResultAllRecords(): int
    {
        return $this->resultAllRecords;
    }

    /**
     * @param int $resultAllRecords
     *
     * @return SearchResponse
     */
    public function setResultAllRecords(int $resultAllRecords): SearchResponse
    {
        $this->resultAllRecords = $resultAllRecords;

        return $this;
    }

    /**
     * @return int
     */
    public function getResultCount(): int
    {
        return $this->resultCount;
    }

    /**
     * @param int $resultCount
     *
     * @return SearchResponse
     */
    public function setResultCount(int $resultCount): SearchResponse
    {
        $this->resultCount = $resultCount;

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
     * @return SearchResponse
     */
    public function setLimit(int $limit): SearchResponse
    {
        $this->limit = $limit;

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
     * @return SearchResponse
     */
    public function setOffset(int $offset): SearchResponse
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return SearchResult[]
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param SearchResult[] $result
     *
     * @return SearchResponse
     */
    public function setResult(array $result): SearchResponse
    {
        $this->result = $result;

        return $this;
    }
}