<?php
namespace Smarti\Metakocka\Resource;

/**
 * Interface ResponseInterface
 * @package Smarti\Metakocka\Resource
 */
interface ResponseInterface
{
    /**
     * Parse response data and return object
     * @param \stdClass $data
     */
    public function parse($data);

    public function getData();
}