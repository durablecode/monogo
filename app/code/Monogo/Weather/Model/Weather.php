<?php
declare(strict_types=1);

namespace Monogo\Weather\Model;

use Magento\Framework\Model\AbstractModel;
use Monogo\Weather\Model\ResourceModel\Weather as WeatherResource;

/**
 * Class Weather
 * @package Monogo\Weather\Model
 */
class Weather extends AbstractModel
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        $this->_init(WeatherResource::class);
    }
}
