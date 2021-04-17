<?php

namespace Smarti\Metakocka\Resource;

use stdClass;

/**
 * Class ResponseBase
 * @package Smarti\Metakocka\Resource
 */
abstract class ResponseBase
{
    protected int $oprCode = 0;
    protected int $oprCodeApp = 0;
    protected ?string $oprDesc = null;
    protected ?string $oprDescApp = null;
    protected int $oprTime = 0;

    /**
     * @return int
     */
    public function getOprCode(): int
    {
        return $this->oprCode;
    }

    /**
     * @param int $oprCode
     *
     * @return ResponseBase
     */
    public function setOprCode(int $oprCode): ResponseBase
    {
        $this->oprCode = $oprCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getOprCodeApp(): int
    {
        return $this->oprCodeApp;
    }

    /**
     * @param int $oprCodeApp
     *
     * @return ResponseBase
     */
    public function setOprCodeApp(int $oprCodeApp): ResponseBase
    {
        $this->oprCodeApp = $oprCodeApp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOprDesc(): ?string
    {
        return $this->oprDesc;
    }

    /**
     * @param string|null $oprDesc
     *
     * @return ResponseBase
     */
    public function setOprDesc(?string $oprDesc): ResponseBase
    {
        $this->oprDesc = $oprDesc;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOprDescApp(): ?string
    {
        return $this->oprDescApp;
    }

    /**
     * @param string|null $oprDescApp
     *
     * @return ResponseBase
     */
    public function setOprDescApp(?string $oprDescApp): ResponseBase
    {
        $this->oprDescApp = $oprDescApp;

        return $this;
    }

    /**
     * @return int
     */
    public function getOprTime(): int
    {
        return $this->oprTime;
    }

    /**
     * @param int $oprTime
     *
     * @return ResponseBase
     */
    public function setOprTime(int $oprTime): ResponseBase
    {
        $this->oprTime = $oprTime;

        return $this;
    }
}