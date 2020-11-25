<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\Api;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Monogo\Weather\Api\WeatherInterface;
use Monogo\Weather\Model\{
    Api,
    WeatherRepository
};
use Monogo\Weather\Api\Data\WeatherInterface as DataWeatherInterface;
use Monogo\Weather\Model\Provider\Config\CurrentWeather;

/**
 * Class Weather
 * @package Monogo\Weather\Model\Api
 */
class Weather implements WeatherInterface
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @var WeatherRepository
     */
    private $weatherRepository;

    /**
     * @var DataWeatherInterface
     */
    private $weather;

    /**
     * @var CurrentWeather
     */
    private $currentWeatherConfig;

    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * Weather constructor.
     * @param Api $api
     * @param WeatherRepository $weatherRepository
     * @param DataWeatherInterface $weather
     * @param CurrentWeather $currentWeatherConfig
     * @param DateTime $dateTime
     */
    public function __construct(
        Api $api,
        WeatherRepository $weatherRepository,
        DataWeatherInterface $weather,
        CurrentWeather $currentWeatherConfig,
        DateTime $dateTime
    )
    {
        $this->api = $api;
        $this->weatherRepository = $weatherRepository;
        $this->weather = $weather;
        $this->currentWeatherConfig = $currentWeatherConfig;
        $this->dateTime = $dateTime;
    }

    /**
     * {@InheritDoc}
     */
    public function getCurrent(): DataWeatherInterface
    {
        $country = $this->currentWeatherConfig->getCountry();
        $city = $this->currentWeatherConfig->getRegion();
        $unit = $this->currentWeatherConfig->getUnit();

        $url = $this->api->buildUrl([
            [
                'q', $city.','.$country,
            ],
            [
                'lang', $this->currentWeatherConfig->getTranslation()
            ],
            [
                'units', $unit
            ]
        ]);

        $this->api->get($url);
        $body = $this->api->getBody();
        $weatherData = current($body['weather']);

        $data = $this->weather
            ->setDescription($weatherData['description'])
            ->setCity($city)
            ->setCountry($country)
            ->setTemp((float) $body['main']['temp'])
            ->setMaxTemp($body['main']['temp_max'])
            ->setMinTemp($body['main']['temp_min'])
            ->setWindIconId($weatherData['icon'])
            ->setWindSpeed((int) $body['wind']['speed'])
            ->setWindDeg((int) $body['wind']['deg'])
            ->setPressure((int) $body['main']['pressure'])
            ->setUnit($unit)
            ->setHumidity($body['main']['humidity'])
            ->setCreatedAt($this->dateTime->gmtDate());

        $this->weatherRepository->save($data);
        return $data;
    }
}
