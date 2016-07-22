<?php
namespace Smarti\Metakocka\Resource;

class DataFormat
{
    /**
     * @param $value
     * @return string
     */
    public static function formatBool($value)
    {
        return $value ? 'true' : 'false';
    }

    /**
     * @param $value
     * @return bool
     */
    public static function parseBool($value)
    {
        return $value == 'true';
    }
}