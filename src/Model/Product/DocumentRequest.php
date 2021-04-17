<?php

namespace Smarti\Metakocka\Model\Product;

use Smarti\Metakocka\Resource\RequestInterface;

class DocumentRequest implements RequestInterface
{
    private string $docType = '';
    private string $docId = '';

    /**
     * @return array
     */
    public function prepare(): array
    {
        return [
            'doc_type' => $this->docType,
            'doc_id' => $this->docId,
        ];
    }

    /**
     * No required params
     * @return bool
     */
    public function validate(): bool
    {
        return true;
    }

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
     * @return DocumentRequest
     */
    public function setDocType(string $docType): DocumentRequest
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocId(): string
    {
        return $this->docId;
    }

    /**
     * @param string $docId
     *
     * @return DocumentRequest
     */
    public function setDocId(string $docId): DocumentRequest
    {
        $this->docId = $docId;

        return $this;
    }
}