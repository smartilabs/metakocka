<?php
namespace Smarti\Metakocka\Resource\Sales;

use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\Partner\PartnerRequest;
use Smarti\Metakocka\Resource\Product\ItemRequest;
use Smarti\Metakocka\Resource\RequestInterface;

class BillRequest implements RequestInterface
{
    /** @var bool */
    private $foreign = false;

    /** @var string */
    private $countCode = null;

    /** @var \DateTime */
    private $billDate = null;

    /** @var \DateTime */
    private $paymentDate = null;

    /** @var string */
    private $locationOfService = null;

    /** @var string */
    private $warehouse = null;

    /** @var string */
    private $buyerOrder = null;

    /** @var PartnerRequest */
    private $partner = null;

    /** @var PaymentRequest[] */
    private $markPaid = [];

    /** @var ItemRequest[] */
    private $productList = [];

    /** @var bool */
    private $sendToFurs = false;

    /**
     * @return array
     */
    public function prepare()
    {
        $data = [
            'foreign' => DataFormat::formatBool($this->foreign),
            'bill_date' => $this->billDate->format('d.m.Y'),
            'payment_date' => $this->paymentDate->format('d.m.Y'),
            'buyer_order' => $this->buyerOrder,
            'partner' => $this->partner->prepare(),
            'send_to_furs' => DataFormat::formatBool($this->sendToFurs),
        ];

        // only add if set, else leave empty and MK automatic ID will be set
        if (!empty($this->countCode))
            $data['count_code'] = $this->countCode;

        // MK automatic if not set
        if (!empty($this->locationOfService))
            $data['location_of_service'] = $this->locationOfService;

        $payments = $this->preparePayments();
        if (!empty($payments))
            $data['mark_paid'] = $this->preparePayments();

        $products = $this->prepareProducts();
        if (!empty($products))
            $data['product_list'] = $this->prepareProducts();

        return $data;
    }

    /**
     * @return bool
     * @throws InvalidDataException
     */
    public function validate()
    {
//        if (empty($this->countCode))
//            throw new InvalidDataException('countCode field is required');

        if (strlen($this->countCode) > 30)
            throw new InvalidDataException('countCode field must not exceed 30 chars');

        if (!$this->billDate)
            throw new InvalidDataException('billDate is required');

        if (!$this->paymentDate)
            throw new InvalidDataException('paymentDate is required');

        if (empty($this->partner))
            throw new InvalidDataException('partner is required');

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
     * @param boolean $foreign
     */
    public function setForeign($foreign)
    {
        $this->foreign = $foreign;
    }

    /**
     * @param \DateTime $billDate
     */
    public function setBillDate(\DateTime $billDate)
    {
        $this->billDate = $billDate;
    }

    /**
     * @param \DateTime $paymentDate
     */
    public function setPaymentDate(\DateTime $paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @param string $locationOfService
     */
    public function setLocationOfService($locationOfService)
    {
        $this->locationOfService = $locationOfService;
    }

    /**
     * @param string $warehouse
     */
    public function setWarehouse($warehouse)
    {
        $this->warehouse = $warehouse;
    }

    /**
     * @param string $buyerOrder
     */
    public function setBuyerOrder($buyerOrder)
    {
        $this->buyerOrder = $buyerOrder;
    }

    /**
     * @param PartnerRequest $partner
     */
    public function setPartner(PartnerRequest $partner)
    {
        $this->partner = $partner;
    }

    /**
     * @param PaymentRequest[] $markPaid
     */
    public function setMarkPaid($markPaid)
    {
        $this->markPaid = $markPaid;
    }

    /**
     * @param ItemRequest $product
     */
    public function addProduct(ItemRequest $product)
    {
        $this->productList[] = $product;
    }

    /**
     * @return array
     */
    private function preparePayments()
    {
        $data = [];

        foreach ($this->markPaid as $markPaid)
            $data[] = $markPaid->prepare();

        return $data;
    }

    /**
     * @param boolean $sendToFurs
     */
    public function setSendToFurs($sendToFurs)
    {
        $this->sendToFurs = $sendToFurs;
    }

    /**
     * @return array
     */
    private function prepareProducts()
    {
        $data = [];

        foreach ($this->productList as $product)
            $data[] = $product->prepare();

        return $data;
    }
}