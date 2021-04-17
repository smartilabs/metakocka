<?php

namespace Smarti\Metakocka\Model\Asset;

/**
 * Class DocumentLink
 * @package Smarti\Metakocka\Model\Asset
 */
class DocumentLink
{
    protected string $mk_id;
    protected string $count_code;
    protected string $doc_type;

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
     * @return DocumentLink
     */
    public function setMkId(string $mk_id): DocumentLink
    {
        $this->mk_id = $mk_id;

        return $this;
    }

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
     * @return DocumentLink
     */
    public function setCountCode(string $count_code): DocumentLink
    {
        $this->count_code = $count_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocType(): string
    {
        return $this->doc_type;
    }

    /**
     * @param string $doc_type
     *
     * @return DocumentLink
     */
    public function setDocType(string $doc_type): DocumentLink
    {
        $this->doc_type = $doc_type;

        return $this;
    }
}