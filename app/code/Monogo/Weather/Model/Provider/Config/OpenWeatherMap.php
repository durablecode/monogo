<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\Provider\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Monogo\Weather\Model\Provider\ConfigAbstract;

/**
 * Class OpenWeatherMap
 * @package Monogo\Weather\Model\Provider\Config
 */
class OpenWeatherMap extends ConfigAbstract
{
    /**
     * @var string
     */
    private const API_KEY = 'monogo_api/openweathermap/api_key';

    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    /**
     * OpenWeatherMap constructor.
     * @param ScopeConfigInterface $config
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        ScopeConfigInterface $config,
        EncryptorInterface $encryptor
    )
    {
        $this->encryptor = $encryptor;

        parent::__construct($config);
    }

    /**
     * Get api key
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->encryptor->decrypt($this->getValueByPath(self::API_KEY));
    }
}
