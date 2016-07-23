<?php
namespace Smarti\Metakocka\Resource;

interface RequestInterface
{
    /**
     * Prepare request data array
     * @return array
     */
    public function prepare() : array;

    /**
     * Validate field limits and requirements
     * @return bool
     */
    public function validate() : bool;
}