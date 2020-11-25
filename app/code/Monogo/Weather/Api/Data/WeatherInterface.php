<?php
declare(strict_types=1);

namespace Monogo\Weather\Api\Data;

/**
 * Interface WeatherInterface
 * @package Monogo\Weather\Api\Data
 */
interface WeatherInterface
{
    /**
     * Description
     */
    public const DESCRIPTION = 'description';

    /**
     * City
     */
    public const CITY = 'city';

    /**
     * Country
     */
    public const COUNTRY = 'country';

    /**
     * Temperature
     */
    public const TEMPERATURE = 'temp';

    /**
     * Minumum temperature
     */
    public const MINIMUM_TEMPERATURE = 'temp_min';

    /**
     * Maximum temperature
     */
    public const MAXIMUM_TEMPERATURE = 'temp_max';

    /**
     * Wind icon id
     */
    public const WIND_ICON_ID = 'wind_icon_id';

    /**
     * Wind speed
     */
    public const WIND_SPEED = 'wind_speed';

    /**
     * Wind direction
     */
    public const WIND_DEG = 'wind_deg';

    /**
     * Pressure
     */
    public const PRESSURE = 'pressure';

    /**
     * Unit type
     */
    public const UNIT_TYPE = 'unit_type';

    /**
     * Metric
     */
//    public const METRIC = 'metric';

    /**
     * Humidity
     */
    public const HUMIDITY = 'humidity';

    /**
     * Created at
     */
    public const CREATED_AT = 'created_at';

    /**
     * Set description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * Get city
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city);

    /**
     * Get city
     *
     * @return string
     */
    public function getCity(): string;

    /**
     * Set country code
     *
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country);

    /**
     * Get country code
     *
     * @return string
     */
    public function getCountry(): string;

    /**
     * Set temperature
     *
     * @param float $temp
     * @return $this
     */
    public function setTemp(float $temp);

    /**
     * Get temperature
     *
     * @return float
     */
    public function getTemp(): float;

    /**
     * Set maximum temperature
     *
     * @param float $temp
     * @return $this
     */
    public function setMaxTemp(float $temp);

    /**
     * Get maximum temperature
     *
     * @return float
     */
    public function getMaxTemp(): float;

    /**
     * Set minimum temperature
     *
     * @param float $temp
     * @return $this
     */
    public function setMinTemp(float $temp);

    /**
     * Get minimum temperature
     *
     * @return float
     */
    public function getMinTemp(): float;

    /**
     * Set wind icon id
     *
     * @param string $iconId
     * @return $this
     */
    public function setWindIconId(string $iconId);

    /**
     * Get wind icon id
     *
     * @return string
     */
    public function getWindIconId(): string;

    /**
     * Set wind speed
     *
     * @param int $speed
     * @return $this
     */
    public function setWindSpeed(int $speed);

    /**
     * Get wind speed
     *
     * @return int
     */
    public function getWindSpeed(): int;

    /**
     * Set wind direction
     *
     * @param int $deg
     * @return $this
     */
    public function setWindDeg(int $deg);

    /**
     * Get wind direction
     *
     * @return int
     */
    public function getWindDeg(): int;

    /**
     * Set pressure
     *
     * @param int $pressure
     * @return $this
     */
    public function setPressure(int $pressure);

    /**
     * Get pressure
     *
     * @return int
     */
    public function getPressure(): int;

    /**
     * Set unit
     *
     * @param string $type
     * @return $this
     */
    public function setUnit(string $type);

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit(): string;

    /**
     * Set humidity
     *
     * @param int $humidity
     * @return $this
     */
    public function setHumidity(int $humidity);

    /**
     * Get humidity
     *
     * @return int
     */
    public function getHumidity(): int;

    /**
     * Set created at
     *
     * @param $date
     * @return $this
     */
    public function setCreatedAt($date);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt(): string;
}
