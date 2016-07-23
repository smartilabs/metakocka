<?php
namespace Smarti\Metakocka\Resource;

abstract class ResponseBase implements ResponseInterface
{
    /** @var \stdClass */
    private $data;

    /** @var int */
    private $oprCode = 0;

    /** @var int */
    private $oprCodeApp = 0;

    /** @var string */
    private $oprDesc = null;

    /** @var string */
    private $oprDescApp = null;

    /** @var int */
    private $oprTimeMs = 0;

    /**
     * ResponseBase constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->data = $data;

        $this->parseBase($data);
        $this->parse($data);
    }

    /**
     * @param $data
     */
    protected final function parseBase(\stdClass $data)
    {
        $this->oprCode = (int)$data->opr_code;
        $this->oprCodeApp = (int)($data->opr_code_app ?? 0);
        $this->oprDesc = $data->opr_desc ?? '';
        $this->oprDescApp = $data->opr_desc ?? '';
        $this->oprTimeMs = (int)$data->opr_time_ms;
    }

    /**
     * @return int
     */
    public function getOprCode()
    {
        return $this->oprCode;
    }

    /**
     * @return int
     */
    public function getOprCodeApp()
    {
        return $this->oprCodeApp;
    }

    /**
     * @return string
     */
    public function getOprDesc()
    {
        return $this->oprDesc;
    }

    /**
     * @return string
     */
    public function getOprDescApp()
    {
        return $this->oprDescApp;
    }

    /**
     * @return int
     */
    public function getOprTimeMs()
    {
        return $this->oprTimeMs;
    }

    /**
     * @return mixed
     */
    public function getData() : \stdClass
    {
        return $this->data;
    }
}