<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\Provider\Config;

use Monogo\Weather\Model\Provider\ConfigAbstract;

/**
 * Class CurrentWeather
 * @package Monogo\Weather\Model\Provider\Config
 */
class CurrentWeather extends ConfigAbstract
{
    /**
     * @var string
     */
    private const COUNTRY = 'monogo_api/current_weather/country';

    /**
     * @var string
     */
    private const REGION = 'monogo_api/current_weather/region';

    /**
     * @var string
     */
    private const TRANSLATION = 'monogo_api/current_weather/translation';

    /**
     * @var string
     */
    private const UNIT = 'monogo_api/current_weather/unit';

    /**
     * @var string
     */
    private const REFRESH_WEATHER = 'monogo_api/current_weather/refresh_time';

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion(): string
    {
        return (string) $this->getValueByPath(self::REGION);
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry(): string
    {
        return (string) $this->getValueByPath(self::COUNTRY);
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation(): string
    {
        return (string) $this->getValueByPath(self::TRANSLATION);
    }

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit(): string
    {
        return (string) $this->getValueByPath(self::UNIT);
    }

    /**
     * Get time to refresh weather on store
     *
     * @return int
     */
    public function getRefreshTime(): int
    {
        return (int) $this->getValueByPath(self::REFRESH_WEATHER);
    }
}
