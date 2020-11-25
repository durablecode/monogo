<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\Provider;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ConfigAbstract
 * @package Monogo\Weather\Model\Provider
 */
abstract class ConfigAbstract
{
    /**
     * @var ScopeConfigInterface
     */
    private $config;

    /**
     * ConfigAbstract constructor.
     * @param ScopeConfigInterface $config
     */
    public function __construct(
        ScopeConfigInterface $config
    )
    {
        $this->config = $config;
    }

    /**
     * Get value by path
     *
     * @param string $path
     * @return null|string
     */
    protected function getValueByPath(string $path): ?string
    {
        return $this->config->getValue($path, ScopeInterface::SCOPE_STORE);
    }

}
