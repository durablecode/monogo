<?php

namespace Monogo\Weather\Api;

/**
 * Interface WeatherInterface
 * @package Monogo\Weather\Api
 */
interface WeatherInterface
{
    /**
     * @api
     * @return []
     */
    public function getCurrent();
}
