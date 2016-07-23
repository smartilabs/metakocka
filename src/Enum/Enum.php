<?php
namespace Smarti\Metakocka\Enum;

/**
 * Class Enum
 * @package Smarti\Metakocka\Enum
 */
class Enum
{
    /**
     * @return array
     */
    public function getConstList()
    {
        $c = new \ReflectionClass($this);

        return $c->getConstants();
    }
}