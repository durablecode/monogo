<?php
declare(strict_types=1);

namespace Monogo\Weather\Api;

use Monogo\Weather\Api\Data\WeatherInterface;

/**
 * Interface WeatherRepositoryInterface
 * @package Monogo\Weather\Api
 */
interface WeatherRepositoryInterface
{
    /**
     * @param WeatherInterface $weather
     * @return WeatherInterface
     */
    public function save(WeatherInterface $weather): WeatherInterface;
}
