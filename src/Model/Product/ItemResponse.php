<?php
namespace Smarti\Metakocka\Model\Product;

use Smarti\Metakocka\Resource\ResponseBase;
use Smarti\Metakocka\Resource\ResponseInterface;

class ItemResponse extends ResponseBase
{
    /** @var int */
    private $mkId = null;

    /** @var string */
    private $countCode = null;

    /**
     * @param \stdClass $data
     * @return ResponseInterface
     */
    public function parse(\stdClass $data)
    {
        $this->mkId = (int)(isset($data->mk_id) ? $data->mk_id : 0);
        $this->countCode = isset($data->count_code) ? $data->count_code : '';
    }

    /**
     * @return int
     */
    public function getMkId()
    {
        return $this->mkId;
    }

    /**
     * @return string
     */
    public function getCountCode()
    {
        return $this->countCode;
    }
}