<?php
declare(strict_types=1);

namespace Monogo\Weather\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

use Monogo\Weather\Model\Provider\Config\CurrentWeather;

/**
 * Class Weather
 * @package Monogo\Weather\Block
 */
class Weather extends Template
{
    /**
     * @var CurrentWeather
     */
    private $currentWeather;

    /**
     * Weather constructor.
     * @param CurrentWeather $currentWeather
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        CurrentWeather $currentWeather,
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->currentWeather = $currentWeather;
    }

    /**
     * @return int
     */
    public function getRefreshTime()
    {
        return $this->currentWeather->getRefreshTime();
    }
}
