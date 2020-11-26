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
use Monogo\Weather\Model\ResourceModel\Weather\Collection as WeatherCollection;

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
     * @var WeatherCollection
     */
    private $weatherCollection;

    /**
     * Weather constructor.
     * @param Api $api
     * @param WeatherRepository $weatherRepository
     * @param DataWeatherInterface $weather
     * @param CurrentWeather $currentWeatherConfig
     * @param DateTime $dateTime
     * @param WeatherCollection $weatherCollection
     */
    public function __construct(
        Api $api,
        WeatherRepository $weatherRepository,
        DataWeatherInterface $weather,
        CurrentWeather $currentWeatherConfig,
        DateTime $dateTime,
        WeatherCollection $weatherCollection
    )
    {
        $this->api = $api;
        $this->weatherRepository = $weatherRepository;
        $this->weather = $weather;
        $this->currentWeatherConfig = $currentWeatherConfig;
        $this->dateTime = $dateTime;
        $this->weatherCollection = $weatherCollection;
    }

    /**
     * {@InheritDoc}
     */
    public function getCurrent(): DataWeatherInterface
    {
        $url = $this->api->buildUrl([
            [
                'q', $this->currentWeatherConfig->getRegion().','.$this->currentWeatherConfig->getCountry(),
            ],
            [
                'lang', $this->currentWeatherConfig->getTranslation()
            ],
            [
                'units', $this->currentWeatherConfig->getUnit()
            ]
        ]);

        if($this->canAddRow()) {
            $this->api->get($url);
            $body = $this->api->getBody();
            $weatherData = current($body['weather']);

            //conversion data to common array with the same indexes
            $data = $this->setupDataToDTO([
               'description' => $weatherData['description'],
                'city' => $this->currentWeatherConfig->getRegion(),
                'country' => $this->currentWeatherConfig->getCountry(),
                'temp' => $body['main']['temp'],
                'temp_max' => $body['main']['temp_max'],
                'temp_min' => $body['main']['temp_min'],
                'wind_icon_id' => $weatherData['icon'],
                'wind_speed' => $body['wind']['speed'],
                'wind_deg' => $body['wind']['deg'],
                'pressure' => $body['main']['pressure'],
                'unit_type' => $this->currentWeatherConfig->getUnit(),
                'humidity' => $body['main']['humidity'],
                'created_at' => $this->dateTime->gmtDate()
            ]);
            $this->weatherRepository->save($data);
        } else {
            $data = $this->setupDataToDTO($this->weatherCollection->getLastItem()->getData());
        }

        return $data;
    }

    /**
     * @param array $data
     * @return DataWeatherInterface
     */
    private function setupDataToDTO(array $data): DataWeatherInterface
    {
        return $this->weather
            ->setDescription($data['description'])
            ->setCity($data['city'])
            ->setCountry($data['country'])
            ->setTemp((float) $data['temp'])
            ->setMaxTemp((float) $data['temp_max'])
            ->setMinTemp((float) $data['temp_min'])
            ->setWindIconId($data['wind_icon_id'])
            ->setWindSpeed((int) $data['wind_speed'])
            ->setWindDeg((int) $data['wind_deg'])
            ->setPressure((int) $data['pressure'])
            ->setUnit($data['unit_type'])
            ->setHumidity((int) $data['humidity'])
            ->setCreatedAt($data['created_at']);
    }

    /**
     * Check if fulfillment conditions
     *
     * @return bool
     */
    private function canAddRow(): bool
    {
        $lastRow = $this->weatherCollection->getLastItem();

        if(!is_null($lastRow)) {
            $lastRowTime = strtotime($lastRow->getCreatedAt());
            $currentTime = $this->dateTime->gmtTimestamp();

            return (($currentTime - $lastRowTime) / 60) >= $this->currentWeatherConfig->getRefreshTime();
        }

        return true;
    }
}
