<?php
namespace Smarti\Metakocka\Resource\Partner;

use Smarti\Metakocka\Enum\Unit;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class PartnerContactRequest implements RequestInterface
{
    /** @var string */
    private $name = '';

    /** @var string */
    private $phone = '';

    /** @var string */
    private $fax = '';

    /** @var string */
    private $gsm = '';

    /** @var string */
    private $email = '';

    /**
     * @return array
     */
    public function prepare() : array
    {
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'gsm' => $this->gsm,
            'email' => $this->email,

        ];

        return $data;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = trim($name);
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = trim($phone);
    }

    /**
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = trim($fax);
    }

    /**
     * @param string $gsm
     */
    public function setGsm($gsm)
    {
        $this->gsm = trim($gsm);
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = trim($email);
    }
}