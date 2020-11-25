<?php
declare(strict_types=1);

namespace Monogo\Weather\Model;

use Monogo\Weather\Api\Data\WeatherInterface;
use Monogo\Weather\Api\WeatherRepositoryInterface;

/**
 * Class WeatherRepository
 * @package Monogo\Weather\Model
 */
class WeatherRepository implements WeatherRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function save(WeatherInterface $weather): WeatherInterface
    {
        $weather->getResource()->save($weather);

        return $weather;
    }
}
