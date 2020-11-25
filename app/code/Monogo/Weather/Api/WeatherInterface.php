<?php

namespace Monogo\Weather\Api;

/**
 * Interface WeatherInterface
 * @package Monogo\Weather\Api
 */
interface WeatherInterface
{
    /**
     *
     * @api
     * @return \Monogo\Weather\Api\Data\WeatherInterface
     */
    public function getCurrent();
}
