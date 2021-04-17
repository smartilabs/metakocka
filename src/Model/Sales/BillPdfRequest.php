<?php
namespace Smarti\Metakocka\Model\Sales;

use Smarti\Metakocka\Exception\InvalidDataException;
use Smarti\Metakocka\Resource\DataFormat;
use Smarti\Metakocka\Resource\Partner\PartnerRequest;
use Smarti\Metakocka\Resource\Product\ItemRequest;
use Smarti\Metakocka\Resource\RequestInterface;

class BillPdfRequest implements RequestInterface
{
    /** @var string */
    private $countCode = null;

    /** @var bool */
    private $hideCode = false;

    /** @var string */
    private $country = 'si';

    /** @var string */
    private $locale = 'sl';


    /**
     * @return array
     */
    public function prepare()
    {
        $data = [
            'count_code' => $this->countCode,
            'country' => $this->country,
            'locale' => $this->locale,
            'hide_code' => DataFormat::formatBool($this->hideCode),
        ];

        return $data;
    }

    /**
     * @return bool
     * @throws InvalidDataException
     */
    public function validate()
    {
        if (empty($this->countCode))
            throw new InvalidDataException('countCode field is required');

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
     * @param boolean $hideCode
     */
    public function setHideCode($hideCode)
    {
        $this->hideCode = $hideCode;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = trim($country);
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = trim($locale);
    }
}