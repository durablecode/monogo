<?php
declare(strict_types=1);

namespace Monogo\Weather\Model;

use Magento\Framework\Model\AbstractModel;
use Monogo\Weather\Model\ResourceModel\Weather as WeatherResource;
use Monogo\Weather\Api\Data\WeatherInterface;

/**
 * Class Weather
 * @package Monogo\Weather\Model
 */
class Weather extends AbstractModel implements WeatherInterface
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        $this->_init(WeatherResource::class);
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(string $description)
    {
        return $this->setData(WeatherInterface::DESCRIPTION, $description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return $this->getData(WeatherInterface::DESCRIPTION);
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(string $city)
    {
        return $this->setData(WeatherInterface::CITY, $city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(): string
    {
        return $this->getData(WeatherInterface::CITY);
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry(string $country)
    {
        return $this->setData(WeatherInterface::COUNTRY, $country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry(): string
    {
        return $this->getData(WeatherInterface::COUNTRY);
    }

    /**
     * {@inheritDoc}
     */
    public function setTemp(float $temp)
    {
        return $this->setData(WeatherInterface::TEMPERATURE, $temp);
    }

    /**
     * {@inheritDoc}
     */
    public function getTemp(): string
    {
        return $this->getData(WeatherInterface::TEMPERATURE);
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxTemp(float $temp)
    {
        return $this->setData(WeatherInterface::MAXIMUM_TEMPERATURE, $temp);
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxTemp(): float
    {
        return $this->getData(WeatherInterface::MAXIMUM_TEMPERATURE);
    }

    /**
     * {@inheritDoc}
     */
    public function setMinTemp(float $temp)
    {
        return $this->setData(WeatherInterface::MINIMUM_TEMPERATURE, $temp);
    }

    /**
     * {@inheritDoc}
     */
    public function getMinTemp(): float
    {
        return $this->getData(WeatherInterface::MINIMUM_TEMPERATURE);
    }

    /**
     * {@inheritDoc}
     */
    public function setWindIconId(string $iconId)
    {
        return $this->setData(WeatherInterface::WIND_ICON_ID, $iconId);
    }

    /**
     * {@inheritDoc}
     */
    public function getWindIconId(): string
    {
        return $this->getData(WeatherInterface::WIND_ICON_ID);
    }

    /**
     * {@inheritDoc}
     */
    public function setWindSpeed(int $speed)
    {
        return $this->setData(WeatherInterface::WIND_SPEED, $speed);
    }

    /**
     * {@inheritDoc}
     */
    public function getWindSpeed(): int
    {
        return $this->getData(WeatherInterface::WIND_SPEED);
    }

    /**
     * {@inheritDoc}
     */
    public function setWindDeg(int $deg)
    {
        return $this->setData(WeatherInterface::WIND_DEG, $deg);
    }

    /**
     * {@inheritDoc}
     */
    public function getWindDeg(): int
    {
        return $this->getData(WeatherInterface::WIND_DEG);
    }

    /**
     * {@inheritDoc}
     */
    public function setPressure(int $pressure)
    {
        return $this->setData(WeatherInterface::PRESSURE, $pressure);
    }

    /**
     * {@inheritDoc}
     */
    public function getPressure(): int
    {
        return $this->getData(WeatherInterface::PRESSURE);
    }

    /**
     * {@inheritDoc}
     */
    public function setUnit(string $type)
    {
        return $this->setData(WeatherInterface::UNIT_TYPE, $type);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnit(): string
    {
        return $this->getData(WeatherInterface::UNIT_TYPE);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($date)
    {
        return $this->setData(WeatherInterface::CREATED_AT, $date);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): string
    {
        return $this->getData(WeatherInterface::CREATED_AT);
    }
}
