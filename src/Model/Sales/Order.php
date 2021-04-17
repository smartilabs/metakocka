<?php

namespace Smarti\Metakocka\Model\Sales;

use Carbon\Carbon;
use Smarti\Metakocka\Model\Asset\DocumentLink;
use Smarti\Metakocka\Model\Asset\ExtraColumn;
use Smarti\Metakocka\Model\Partner\Partner;
use Smarti\Metakocka\Model\Product\Product;
use Smarti\Metakocka\Resource\ResponseBase;

class Order extends ResponseBase
{
    protected string $mkId;
    protected string $countCode;
    protected string $docType;
    protected ?Carbon $docDate;

    protected string $currencyCode;
    protected string $statusCode;
    protected string $title;
    protected string $docCreatedEmail;
    protected string $buyerOrder;
    protected string $warehouse;
    protected string $deliveryType;

    protected float $sumBasic = 0;
    protected float $sumTaxEx4 = 0;
    protected float $sumAll = 0;
    protected float $sumPaid = 0;
    protected string $bankRefNumber;
    protected string $methodOfPayment;
    protected ?Carbon $orderCreateTs = null;
    protected ?Carbon $createTs = null;

    protected ?Partner $partner = null;
    protected ?Partner $receiver = null;

    /** @var Product[] */
    protected array $productList = [];

    /** @var ExtraColumn[]  */
    protected array $extraColumn = [];

    /** @var DocumentLink[]  */
    protected array $docLinklist = [];

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
     * @return Order
     */
    public function setMkId(string $mkId): Order
    {
        $this->mkId = $mkId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountCode(): string
    {
        return $this->countCode;
    }

    /**
     * @param string $countCode
     *
     * @return Order
     */
    public function setCountCode(string $countCode): Order
    {
        $this->countCode = $countCode;

        return $this;
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
     * @return Order
     */
    public function setDocType(string $docType): Order
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getDocDate(): ?Carbon
    {
        return $this->docDate;
    }

    /**
     * @param Carbon|null $docDate
     *
     * @return Order
     */
    public function setDocDate(?Carbon $docDate): Order
    {
        $this->docDate = $docDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     *
     * @return Order
     */
    public function setCurrencyCode(string $currencyCode): Order
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     *
     * @return Order
     */
    public function setStatusCode(string $statusCode): Order
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Order
     */
    public function setTitle(string $title): Order
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocCreatedEmail(): string
    {
        return $this->docCreatedEmail;
    }

    /**
     * @param string $docCreatedEmail
     *
     * @return Order
     */
    public function setDocCreatedEmail(string $docCreatedEmail): Order
    {
        $this->docCreatedEmail = $docCreatedEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getBuyerOrder(): string
    {
        return $this->buyerOrder;
    }

    /**
     * @param string $buyerOrder
     *
     * @return Order
     */
    public function setBuyerOrder(string $buyerOrder): Order
    {
        $this->buyerOrder = $buyerOrder;

        return $this;
    }

    /**
     * @return string
     */
    public function getWarehouse(): string
    {
        return $this->warehouse;
    }

    /**
     * @param string $warehouse
     *
     * @return Order
     */
    public function setWarehouse(string $warehouse): Order
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryType(): string
    {
        return $this->deliveryType;
    }

    /**
     * @param string $deliveryType
     *
     * @return Order
     */
    public function setDeliveryType(string $deliveryType): Order
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    /**
     * @return float
     */
    public function getSumBasic(): float
    {
        return $this->sumBasic;
    }

    /**
     * @param float $sumBasic
     *
     * @return Order
     */
    public function setSumBasic(float $sumBasic): Order
    {
        $this->sumBasic = $sumBasic;

        return $this;
    }

    /**
     * @return float
     */
    public function getSumTaxEx4(): float
    {
        return $this->sumTaxEx4;
    }

    /**
     * @param float $sumTaxEx4
     *
     * @return Order
     */
    public function setSumTaxEx4(float $sumTaxEx4): Order
    {
        $this->sumTaxEx4 = $sumTaxEx4;

        return $this;
    }

    /**
     * @return float
     */
    public function getSumAll(): float
    {
        return $this->sumAll;
    }

    /**
     * @param float $sumAll
     *
     * @return Order
     */
    public function setSumAll(float $sumAll): Order
    {
        $this->sumAll = $sumAll;

        return $this;
    }

    /**
     * @return float
     */
    public function getSumPaid(): float
    {
        return $this->sumPaid;
    }

    /**
     * @param float $sumPaid
     *
     * @return Order
     */
    public function setSumPaid(float $sumPaid): Order
    {
        $this->sumPaid = $sumPaid;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankRefNumber(): string
    {
        return $this->bankRefNumber;
    }

    /**
     * @param string $bankRefNumber
     *
     * @return Order
     */
    public function setBankRefNumber(string $bankRefNumber): Order
    {
        $this->bankRefNumber = $bankRefNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethodOfPayment(): string
    {
        return $this->methodOfPayment;
    }

    /**
     * @param string $methodOfPayment
     *
     * @return Order
     */
    public function setMethodOfPayment(string $methodOfPayment): Order
    {
        $this->methodOfPayment = $methodOfPayment;

        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getOrderCreateTs(): ?Carbon
    {
        return $this->orderCreateTs;
    }

    /**
     * @param Carbon|null $orderCreateTs
     *
     * @return Order
     */
    public function setOrderCreateTs(?Carbon $orderCreateTs): Order
    {
        $this->orderCreateTs = $orderCreateTs;

        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getCreateTs(): ?Carbon
    {
        return $this->createTs;
    }

    /**
     * @param Carbon|null $createTs
     *
     * @return Order
     */
    public function setCreateTs(?Carbon $createTs): Order
    {
        $this->createTs = $createTs;

        return $this;
    }

    /**
     * @return Partner|null
     */
    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    /**
     * @param Partner|null $partner
     *
     * @return Order
     */
    public function setPartner(?Partner $partner): Order
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * @return Partner|null
     */
    public function getReceiver(): ?Partner
    {
        return $this->receiver;
    }

    /**
     * @param Partner|null $receiver
     *
     * @return Order
     */
    public function setReceiver(?Partner $receiver): Order
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return \Smarti\Metakocka\Model\Product\Product[]
     */
    public function getProductList(): array
    {
        return $this->productList;
    }

    /**
     * @param \Smarti\Metakocka\Model\Product\Product[] $productList
     *
     * @return Order
     */
    public function setProductList(array $productList): Order
    {
        $this->productList = $productList;

        return $this;
    }

    /**
     * @return \Smarti\Metakocka\Model\Asset\ExtraColumn[]
     */
    public function getExtraColumn(): array
    {
        return $this->extraColumn;
    }

    /**
     * @param \Smarti\Metakocka\Model\Asset\ExtraColumn[] $extraColumn
     *
     * @return Order
     */
    public function setExtraColumn(array $extraColumn): Order
    {
        $this->extraColumn = $extraColumn;

        return $this;
    }

    /**
     * @return \Smarti\Metakocka\Model\Asset\DocumentLink[]
     */
    public function getDocLinklist(): array
    {
        return $this->docLinklist;
    }

    /**
     * @param \Smarti\Metakocka\Model\Asset\DocumentLink[] $docLinklist
     *
     * @return Order
     */
    public function setDocLinklist(array $docLinklist): Order
    {
        $this->docLinklist = $docLinklist;

        return $this;
    }
}