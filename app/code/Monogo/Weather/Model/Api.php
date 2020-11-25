<?php
declare(strict_types=1);

namespace Monogo\Weather\Model;

use Psr\Log\LoggerInterface;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;
use Monogo\Weather\Model\Provider\Config\OpenWeatherMap;

/**
 * Class Api
 * @package Monogo\Weather\Model
 */
class Api
{
    /** @var string */
    public const PROTOCOL_API = 'http';

    /** @var string */
    public const DOMAIN_URL   = 'api.openweathermap.org/data/2.5/weather';

    /**
     * @var OpenWeatherMap
     */
    private $openWeatherMapConfig;

    /**
     * @var Json
     */
    private $json;

    /**
     * @var Curl
     */
    private $curl;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Api constructor.
     * @param LoggerInterface $logger
     * @param Json $json
     * @param Curl $curl
     * @param OpenWeatherMap $openWeatherMapConfig
     */
    public function __construct(
        LoggerInterface $logger,
        Json $json,
        Curl $curl,
        OpenWeatherMap $openWeatherMapConfig
    )
    {
        $this->openWeatherMapConfig = $openWeatherMapConfig;
        $this->json = $json;
        $this->curl = $curl;
        $this->logger = $logger;
    }

    /**
     * Get connection url to api
     *
     * @return string
     */
    public function getConnectionUrl(): string
    {
        return self::PROTOCOL_API.'://'.self::DOMAIN_URL.'?appid='.$this->openWeatherMapConfig->getApiKey();
    }

    /**
     * Build url to request
     *
     * @param array $params
     * @return string
     */
    public function buildUrl(array $params): string
    {
        $builtParams = '';
        foreach($params as $param) {
            $builtParams .= '&'.implode('=', $param);
        }

        return $this->getConnectionUrl().$builtParams;
    }

    /**
     * Send GET request
     *
     * @param string $url
     */
    public function get(string $url): void
    {
        try {
            $this->curl->get($url);
        } catch(\Exception $exception) {
            $this->logger->critical($exception->getMessage());
        }
    }

    /**
     * Get content of request
     *
     * @return array|null
     */
    public function getBody(): ?array
    {
        $output = $this->json->unserialize((string)$this->curl->getBody());
        $httpCode = $output['cod'];

        if($httpCode!= 200) {
            $this->logger->error("[$httpCode] " . $output['message']);
            return null;
        }

        return $output;
    }
}
