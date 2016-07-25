<?php
namespace Smarti\Metakocka\Resource\Sales;

use Smarti\Metakocka\Enum\PaymentType;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class PaymentRequest implements RequestInterface
{
    /** @var bool */
    private $paymentType = 'Transakcijski račun';

    /** @var \DateTime */
    private $date = null;

    /** @var bool */
    private $markPrepaid = false;

    /** @var float */
    private $amount = 0.0;

    /**
     * @return array
     */
    public function prepare()
    {
        $data = [
            'payment_type' => $this->paymentType,
            'date' => $this->date->format('d.m.Y'),
            'mark_prepaid' => DataFormat::formatBool($this->markPrepaid),
        ];

        if ($this->amount)
            $data['amount'] = $this->amount;

        return $data;
    }

    /**
     * @return bool
     * @throws InvalidDataException
     */
    public function validate()
    {
        if (empty($this->date))
            throw new InvalidDataException('paid date can\'t be empty');

        return true;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @param $paymentType
     * @throws InvalidDataException
     */
    public function setPaymentType($paymentType)
    {
        $list = (new PaymentType())->getConstList();

        if (!in_array($paymentType, $list))
            throw new InvalidDataException('Invalid payment type set. Only values from Smarti\Metakocka\Enum\PaymentType are valid');

        $this->paymentType = $paymentType;
    }

    /**
     * @param bool $markPrepaid
     */
    public function setMarkPrepaid($markPrepaid)
    {
        $this->markPrepaid = $markPrepaid;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}