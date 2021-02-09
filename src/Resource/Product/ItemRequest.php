<?php
namespace Smarti\Metakocka\Resource\Product;

use Smarti\Metakocka\Enum\Tax;
use Smarti\Metakocka\Enum\Unit;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class ItemRequest implements RequestInterface
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
    private $nameDesc = null;

    /** @var string */
    private $unit = Unit::KOL;

    /** @var bool */
    private $service = false;

    /** @var bool */
    private $sales = false;

    /** @var bool */
    private $purchasing = false;

    /** @var float */
    private $height = 0;

    /** @var float */
    private $width = 0;

    /** @var float */
    private $depth = 0;

    /** @var float */
    private $weight = 0;

    // ***********************************
    // just for adding products to invoice

    /** @var float */
    private $amount = 1.0;

    /** @var float */
    private $price = 0.0;

    /** @var float */
    private $discount = 0.0;

    /** @var string */
    private $tax = Tax::TAX_220;


    /**
     * @return array
     */
    public function prepare()
    {
        $data = [
            'count_code' => $this->countCode,
            'code' => $this->code,
            'name' => $this->name,
            'name_desc' => $this->nameDesc,
            'unit' => $this->unit,
            'service' => DataFormat::formatBool($this->service),
            'sales' => DataFormat::formatBool($this->sales),
            'purchasing' => DataFormat::formatBool($this->purchasing),
            'height' => $this->height,
            'width' => $this->width,
            'depth' => $this->depth,
            'weight' => $this->weight,

            'amount' => $this->amount,
            'price' => $this->price,
            'discount' => $this->discount,
            'tax' => $this->tax,
        ];

        if ($this->mkId)
            $data['mk_id'] = $this->mkId;

        return $data;
    }

    /**
     * @return bool
     * @throws InvalidDataException
     */
    public function validate(): bool
    {
        if ($this->countCode && strlen($this->countCode) > 30)
            throw new InvalidDataException('countCode field must not exceed 30 chars');

        if (!$this->mkId && empty($this->code))
            throw new InvalidDataException('code field is required');

        if (strlen($this->code) > 20)
            throw new InvalidDataException('code field must not exceed 20 chars');

        if (!$this->mkId && empty($this->name))
            throw new InvalidDataException('name field is required');

        if (strlen($this->name) > 200)
            throw new InvalidDataException('name field must not exceed 200 chars');

        if ($this->nameDesc && strlen($this->nameDesc) > 700)
            throw new InvalidDataException('countCode field must not exceed 30 chars');

        if (!$this->sales && !$this->purchasing)
            throw new InvalidDataException('One of paramethers - "sales" or "purchasing" must be true');

        return true;
    }

    /**
     * @param string $countCode
     */
    public function setCountCode($countCode)
    {
        $this->countCode = trim($countCode);
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = trim($code);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = trim($name);
    }

    /**
     * @param string $nameDesc
     */
    public function setNameDesc($nameDesc)
    {
        $this->nameDesc = trim($nameDesc);
    }

    /**
     * @param $unit
     * @throws InvalidDataException
     */
    public function setUnit($unit)
    {
        $list = (new Unit())->getConstList();

        if (!in_array($unit, $list))
            throw new InvalidDataException('Invalid unit set. Only values from Smarti\Metakocka\Enum\Unit are valid');

        $this->unit = $unit;
    }

    /**
     * @param boolean $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @param boolean $sales
     */
    public function setSales($sales)
    {
        $this->sales = $sales;
    }

    /**
     * @param boolean $purchasing
     */
    public function setPurchasing($purchasing)
    {
        $this->purchasing = $purchasing;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @param float $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param float $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @param $tax
     * @throws InvalidDataException
     */
    public function setTax($tax)
    {
        $list = (new Tax())->getConstList();

        if (!in_array($tax, $list))
            throw new InvalidDataException('Invalid unit set. Only values from Smarti\Metakocka\Enum\Tax are valid');

        $this->tax = $tax;
    }

    /**
     * @param int $mkId
     */
    public function setMkId($mkId)
    {
        $this->mkId = $mkId;
    }
}