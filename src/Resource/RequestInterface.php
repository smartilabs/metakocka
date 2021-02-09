<?php

namespace Smarti\Metakocka\Resource;

use Smarti\Metakocka\Exception\InvalidDataException;

/**
 * Interface RequestInterface
 * @package Smarti\Metakocka\Resource
 */
interface RequestInterface
{
    /**
     * Prepare request data array
     * @return array
     */
    public function prepare(): array;

    /**
     * Validate field limits and requirements
     * @return bool
     * @throws InvalidDataException
     */
    public function validate(): bool;
}