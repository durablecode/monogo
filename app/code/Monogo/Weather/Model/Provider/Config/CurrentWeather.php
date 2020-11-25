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
     * Get region
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->getValueByPath(self::REGION);
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->getValueByPath(self::COUNTRY);
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->getValueByPath(self::TRANSLATION);
    }

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit(): string
    {
        return $this->getValueByPath(self::UNIT);
    }
}
