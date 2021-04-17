<?php
namespace Smarti\Metakocka\Model\Partner;

/**
 * Class PartnerContact
 * @package Smarti\Metakocka\Model\Partner
 */
class PartnerContact
{
    private ?string $name = '';
    private ?string $phone = '';
    private ?string $fax = '';
    private ?string $gsm = '';
    private ?string $email = '';

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return PartnerContact
     */
    public function setName(?string $name): PartnerContact
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     *
     * @return PartnerContact
     */
    public function setPhone(?string $phone): PartnerContact
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     *
     * @return PartnerContact
     */
    public function setFax(?string $fax): PartnerContact
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    /**
     * @param string|null $gsm
     *
     * @return PartnerContact
     */
    public function setGsm(?string $gsm): PartnerContact
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return PartnerContact
     */
    public function setEmail(?string $email): PartnerContact
    {
        $this->email = $email;

        return $this;
    }
}