<?php
namespace Smarti\Metakocka\Resource\Product;

use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\ResponseBaseObject;
use Smarti\Metakocka\Resource\ResponseInterface;

class ListItemResponse extends ResponseBaseObject
{
    /** @var int */
    private $mkId = null;

    /** @var string */
    private $countCode = null;

    /** @var string */
    private $code = null;

    /** @var string */
    private $name = null;

    /** @var string */
    private $unit = null;

    /** @var bool */
    private $service = null;

    /** @var bool */
    private $sales = null;

    /** @var bool */
    private $purchasing = null;

    /** @var float */
    private $amount = null;

    /** @var bool */
    private $asset = null;

    /** @var bool */
    private $work = null;

    /**
     * @param \stdClass $data
     * @return ResponseInterface
     */
    public function parse(\stdClass $data)
    {
        $this->mkId = (int)($data->mk_id ?? 0);
        $this->countCode = $data->count_code ?? '';
        $this->code = $data->code ?? '';
        $this->name = $data->name ?? '';
        $this->unit = $data->unit?? '';
        $this->service = DataFormat::parseBool($data->unit ?? '');
        $this->sales = DataFormat::parseBool($data->sales ?? '');
        $this->purchasing = DataFormat::parseBool($data->purchasing ?? '');
        $this->asset = DataFormat::parseBool($data->asset ?? '');
        $this->work = DataFormat::parseBool($data->work ?? '');
        $this->amount = DataFormat::parseBool($data->amount ?? '');
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

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return boolean
     */
    public function isService()
    {
        return $this->service;
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
    public function isPurchasing()
    {
        return $this->purchasing;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return boolean
     */
    public function isAsset()
    {
        return $this->asset;
    }

    /**
     * @return boolean
     */
    public function isWork()
    {
        return $this->work;
    }
}