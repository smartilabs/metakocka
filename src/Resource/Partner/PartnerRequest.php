<?php
namespace Smarti\Metakocka\Resource\Partner;

use Smarti\Metakocka\Enum\Unit;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class PartnerRequest implements RequestInterface
{
    /** @var bool */
    private $businessEntity = true;

    /** @var bool */
    private $taxpayer = true;

    /** @var bool */
    private $foreignCountry = false;

    /** @var string */
    private $taxIdNumber = null;

    /** @var string */
    private $customer = null;

    /** @var string */
    private $street = null;

    /** @var string|int */
    private $postNumber = null;

    /** @var string */
    private $place = null;

    /** @var string */
    private $country = 'Slovenija';

    /** @var PartnerContactRequest */
    private $partnerContact = null;

    /** @var PartnerDeliveryAddressRequest */
    private $partnerDeliveryAddress = null;

    /**
     * @return array
     */
    public function prepare() : array
    {
        $data = [
            'business_entity' => DataFormat::formatBool($this->businessEntity),
            'taxpayer' => DataFormat::formatBool($this->taxpayer),
            'foreign_county' => DataFormat::formatBool($this->foreignCountry),
            'tax_id_number' => $this->taxIdNumber,
            'customer' => $this->customer,
            'street' => $this->street,
            'post_number' => $this->postNumber,
            'place' => $this->place,
            'country' => $this->country,

        ];

        if ($this->partnerContact)
            $data['partner_contact'] = $this->partnerContact->prepare();

        if ($this->partnerDeliveryAddress)
            $data['partner_delivery_address'] = $this->partnerDeliveryAddress->prepare();

        return $data;
    }

    /**
     * @return bool
     * @throws InvalidDataException
     */
    public function validate() : bool
    {
        if (empty($this->customer))
            throw new InvalidDataException('customer field is required');

        if (strlen($this->customer) > 100)
            throw new InvalidDataException('customer field must not exceed 20 chars');

        if ($this->taxpayer && empty($this->taxIdNumber))
            throw new InvalidDataException('taxIdNumber field is required for taxpayer');

        return true;
    }

    /**
     * @param bool $businessEntity
     */
    public function setBusinessEntity(bool $businessEntity)
    {
        $this->businessEntity = $businessEntity;

        if (!$businessEntity)
            $this->setTaxpayer(false);
    }

    /**
     * @param bool $taxpayer
     */
    public function setTaxpayer(bool $taxpayer)
    {
        $this->taxpayer = $taxpayer;
    }

    /**
     * @param bool $foreignCountry
     */
    public function setForeignCountry(bool $foreignCountry)
    {
        $this->foreignCountry = $foreignCountry;
    }

    /**
     * @param string $taxIdNumber
     */
    public function setTaxIdNumber($taxIdNumber)
    {
        $this->taxIdNumber = trim($taxIdNumber);
    }

    /**
     * @param string $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = trim($customer);
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param int|string $postNumber
     */
    public function setPostNumber($postNumber)
    {
        $this->postNumber = $postNumber;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param PartnerContactRequest $partnerContact
     */
    public function setPartnerContact(PartnerContactRequest $partnerContact)
    {
        $this->partnerContact = $partnerContact;
    }

    /**
     * @param PartnerDeliveryAddressRequest $partnerDeliveryAddress
     */
    public function setPartnerDeliveryAddress(PartnerDeliveryAddressRequest $partnerDeliveryAddress)
    {
        $this->partnerDeliveryAddress = $partnerDeliveryAddress;
    }
}