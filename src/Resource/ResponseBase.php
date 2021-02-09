<?php
namespace Smarti\Metakocka\Resource;

use stdClass;

abstract class ResponseBase implements ResponseInterface
{
    protected stdClass $data;
    protected int $oprCode = 0;
    protected int $oprCodeApp = 0;
    protected ?string $oprDesc = null;
    protected ?string $oprDescApp = null;
    protected int $oprTimeMs = 0;

    /**
     * ResponseBase constructor.
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->data = $data;

        $this->parseBase($data);
        $this->parse($data);
    }

    /**
     * @param $data
     */
    protected final function parseBase(stdClass $data)
    {
        $this->oprCode = (int)$data->opr_code;
        $this->oprCodeApp = (int)(isset($data->opr_code_app) ? $data->opr_code_app : 0);
        $this->oprDesc = isset($data->opr_desc) ? $data->opr_desc : '';
        $this->oprDescApp = isset($data->opr_desc) ? $data->opr_desc : '';
        $this->oprTimeMs = (int)$data->opr_time_ms;
    }

    /**
     * @return stdClass
     */
    public function getData(): stdClass
    {
        return $this->data;
    }

    /**
     * @param stdClass $data
     *
     * @return ResponseBase
     */
    public function setData(stdClass $data): ResponseBase
    {
        $this->data = $data;

        return $this;
    }

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
    public function getOprTimeMs(): int
    {
        return $this->oprTimeMs;
    }

    /**
     * @param int $oprTimeMs
     *
     * @return ResponseBase
     */
    public function setOprTimeMs(int $oprTimeMs): ResponseBase
    {
        $this->oprTimeMs = $oprTimeMs;

        return $this;
    }
}