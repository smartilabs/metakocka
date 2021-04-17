<?php
namespace Smarti\Metakocka\Model\Product;

use Smarti\Metakocka\Enum\Unit;

class Product
{
    private string $mkId;
    private int $countCode;
    private string $code = '';
    private string $name = '';
    private string $nameDesc = '';
    private string $docDesc = '';
    private string $unit = Unit::KOL;
    private bool $service = false;
    private bool $sales = false;
    private bool $purchasing = false;
    private float $height = 0;
    private float $width = 0;
    private float $depth = 0;
    private float $weight = 0;

    private float $amount = 1.0;
    private float $price = 0.0;
    private float $priceWithTax = 0.0;
    private float $discount = 0.0;
    private string $tax;

    /**
     * @return string
     */
    public function getMkId(): string
    {
        return $this->mkId;
    }

    /**
     * @param string $mkId
     *
     * @return Product
     */
    public function setMkId(string $mkId): Product
    {
        $this->mkId = $mkId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountCode(): int
    {
        return $this->countCode;
    }

    /**
     * @param int $countCode
     *
     * @return Product
     */
    public function setCountCode(int $countCode): Product
    {
        $this->countCode = $countCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Product
     */
    public function setCode(string $code): Product
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameDesc(): string
    {
        return $this->nameDesc;
    }

    /**
     * @param string $nameDesc
     *
     * @return Product
     */
    public function setNameDesc(string $nameDesc): Product
    {
        $this->nameDesc = $nameDesc;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocDesc(): string
    {
        return $this->docDesc;
    }

    /**
     * @param string $docDesc
     *
     * @return Product
     */
    public function setDocDesc(string $docDesc): Product
    {
        $this->docDesc = $docDesc;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     *
     * @return Product
     */
    public function setUnit(string $unit): Product
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return bool
     */
    public function isService(): bool
    {
        return $this->service;
    }

    /**
     * @param bool $service
     *
     * @return Product
     */
    public function setService(bool $service): Product
    {
        $this->service = $service;

        return $this;
    }

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
     * @return Product
     */
    public function setSales(bool $sales): Product
    {
        $this->sales = $sales;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPurchasing(): bool
    {
        return $this->purchasing;
    }

    /**
     * @param bool $purchasing
     *
     * @return Product
     */
    public function setPurchasing(bool $purchasing): Product
    {
        $this->purchasing = $purchasing;

        return $this;
    }

    /**
     * @return float|int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float|int $height
     *
     * @return Product
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return float|int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float|int $width
     *
     * @return Product
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return float|int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param float|int $depth
     *
     * @return Product
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * @return float|int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float|int $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return Product
     */
    public function setAmount(float $amount): Product
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceWithTax(): float
    {
        return $this->priceWithTax;
    }

    /**
     * @param float $priceWithTax
     *
     * @return Product
     */
    public function setPriceWithTax(float $priceWithTax): Product
    {
        $this->priceWithTax = $priceWithTax;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     *
     * @return Product
     */
    public function setDiscount(float $discount): Product
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return string
     */
    public function getTax(): string
    {
        return $this->tax;
    }

    /**
     * @param string $tax
     *
     * @return Product
     */
    public function setTax(string $tax): Product
    {
        $this->tax = $tax;

        return $this;
    }
}