<?php
namespace Smarti\Metakocka\Resource;

abstract class ResponseBaseObject implements ResponseInterface
{
    /** @var \stdClass */
    private $data;

    /**
     * ResponseBase constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->data = $data;

        $this->parse($data);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}