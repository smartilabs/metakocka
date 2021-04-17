<?php
namespace Smarti\Metakocka\Model\Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class SearchRequest implements RequestInterface
{
    private string $docType = '';
    private string $query = '';
    private int $offset = 0;
    private int $limit = 100;

    /**
     * @return string
     */
    public function getDocType(): string
    {
        return $this->docType;
    }

    /**
     * @param string $docType
     *
     * @return SearchRequest
     */
    public function setDocType(string $docType): SearchRequest
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return SearchRequest
     */
    public function setQuery(string $query): SearchRequest
    {
        $this->query = $query;

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
     * @return SearchRequest
     */
    public function setOffset(int $offset): SearchRequest
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
     * @return SearchRequest
     */
    public function setLimit(int $limit): SearchRequest
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
            'query' => $this->query,
            'doc_type' => $this->docType,
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