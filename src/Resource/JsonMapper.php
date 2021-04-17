<?php

namespace Smarti\Metakocka\Resource;

class JsonMapper
{

    /**
     * @param array $items
     * @param string $model
     * @return array
     * @throws \JsonMapper_Exception
     */
    public static function mapArray(array $items, string $model): array
    {
        $mapper = new \JsonMapper();

        $mapper->bEnforceMapType = false;

        $mapped = [];
        foreach ($items as $item) {
            $stationModel = $mapper->map((object)$item, new $model());

            $mapped[] = $stationModel;
        }

        return $mapped;
    }

    /**
     * @param object $item
     * @param object $model
     * @param callable|null $undefinedProperyCallback
     * @param bool $enforceMapType
     * @return object
     * @throws \JsonMapper_Exception
     */
    public static function map(
        object $item,
        object $model,
        callable $undefinedProperyCallback = null,
        bool $enforceMapType = true
    ): object {
        $mapper = new \JsonMapper();

        $mapper->bEnforceMapType = $enforceMapType;

        if ($undefinedProperyCallback) {
            $mapper->undefinedPropertyHandler = $undefinedProperyCallback;
        }

        return $mapper->map($item, $model);
    }

    /**
     * @param array $item
     * @param object $model
     * @return object|mixed
     * @throws \JsonMapper_Exception
     */
    public static function mapFromArray(array $item, object $model): object
    {
        // convert array to object
        $item = (object)json_decode(json_encode($item));

        $mapper = new \JsonMapper();
        $mapper->bEnforceMapType = false;

        return $mapper->map($item, $model);
    }
}
