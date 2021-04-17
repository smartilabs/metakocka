<?php

namespace Smarti\Metakocka\Model\Partner;

use Smarti\Metakocka\Enum\Unit;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class Partner
{
    protected bool $businessEntity = true;
    protected bool $taxpayer = true;
    protected bool $foreignCountry = false;
    protected ?string $taxIdNumber = null;
    protected string $customer;
    protected string $street;
    protected string $postNumber;
    protected string $place;
    protected string $country = 'Slovenija';
    protected ?PartnerContact $partnerContact = null;

    /**
     * @return bool
     */
    public function isBusinessEntity(): bool
    {
        return $this->businessEntity;
    }

    /**
     * @param bool $businessEntity
     *
     * @return Partner
     */
    public function setBusinessEntity(bool $businessEntity): Partner
    {
        $this->businessEntity = $businessEntity;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxpayer(): bool
    {
        return $this->taxpayer;
    }

    /**
     * @param bool $taxpayer
     *
     * @return Partner
     */
    public function setTaxpayer(bool $taxpayer): Partner
    {
        $this->taxpayer = $taxpayer;

        return $this;
    }

    /**
     * @return bool
     */
    public function isForeignCountry(): bool
    {
        return $this->foreignCountry;
    }

    /**
     * @param bool $foreignCountry
     *
     * @return Partner
     */
    public function setForeignCountry(bool $foreignCountry): Partner
    {
        $this->foreignCountry = $foreignCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxIdNumber(): ?string
    {
        return $this->taxIdNumber;
    }

    /**
     * @param string|null $taxIdNumber
     *
     * @return Partner
     */
    public function setTaxIdNumber(?string $taxIdNumber): Partner
    {
        $this->taxIdNumber = $taxIdNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return Partner
     */
    public function setCustomer(string $customer): Partner
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return Partner
     */
    public function setStreet(string $street): Partner
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostNumber(): string
    {
        return $this->postNumber;
    }

    /**
     * @param string $postNumber
     *
     * @return Partner
     */
    public function setPostNumber(string $postNumber): Partner
    {
        $this->postNumber = $postNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     *
     * @return Partner
     */
    public function setPlace(string $place): Partner
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Partner
     */
    public function setCountry(string $country): Partner
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return PartnerContact|null
     */
    public function getPartnerContact(): ?PartnerContact
    {
        return $this->partnerContact;
    }

    /**
     * @param PartnerContact|null $partnerContact
     *
     * @return Partner
     */
    public function setPartnerContact(?PartnerContact $partnerContact): Partner
    {
        $this->partnerContact = $partnerContact;

        return $this;
    }
}