<?php

namespace Smarti\Metakocka\Model\Asset;

/**
 * Class ExtraColumn
 * @package Smarti\Metakocka\Model\Asset
 */
class ExtraColumn
{
    protected string $name;
    protected string $value;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ExtraColumn
     */
    public function setName(string $name): ExtraColumn
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return ExtraColumn
     */
    public function setValue(string $value): ExtraColumn
    {
        $this->value = $value;

        return $this;
    }
}