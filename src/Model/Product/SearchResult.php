<?php
namespace Smarti\Metakocka\Model \Product;

/**
 * Class SearchResult
 * @package Smarti\Metakocka\Model\Product
 */
class SearchResult
{
    protected string $count_code;
    protected string $mk_id;
    protected int $opr_code;

    /**
     * @return string
     */
    public function getCountCode(): string
    {
        return $this->count_code;
    }

    /**
     * @param string $count_code
     *
     * @return SearchResult
     */
    public function setCountCode(string $count_code): SearchResult
    {
        $this->count_code = $count_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getMkId(): string
    {
        return $this->mk_id;
    }

    /**
     * @param string $mk_id
     *
     * @return SearchResult
     */
    public function setMkId(string $mk_id): SearchResult
    {
        $this->mk_id = $mk_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getOprCode(): int
    {
        return $this->opr_code;
    }

    /**
     * @param int $opr_code
     *
     * @return SearchResult
     */
    public function setOprCode(int $opr_code): SearchResult
    {
        $this->opr_code = $opr_code;

        return $this;
    }
}