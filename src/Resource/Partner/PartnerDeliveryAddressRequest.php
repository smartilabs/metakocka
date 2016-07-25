<?php
namespace Smarti\Metakocka\Resource\Partner;

use Smarti\Metakocka\Enum\Unit;
use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\RequestInterface;

class PartnerDeliveryAddressRequest implements RequestInterface
{
    /** @var string */
    private $street = '';

    /** @var string */
    private $postNumber = '';

    /** @var string */
    private $city = '';

    /** @var string */
    private $country = '';

    /**
     * @return array
     */
    public function prepare()
    {
        $data = [
            'street' => $this->street,
            'post_number' => $this->postNumber,
            'city' => $this->city,
            'country' => $this->country,

        ];

        return $data;
    }

    /**
     * @return bool
     */
    public function validate() 
    {
        return true;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = trim($street);
    }

    /**
     * @param string $postNumber
     */
    public function setPostNumber($postNumber)
    {
        $this->postNumber = trim($postNumber);
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = trim($city);
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = trim($country);
    }
}