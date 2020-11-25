<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Weather
 * @package Monogo\Weather\Model\ResourceModel
 */
class Weather extends AbstractDb
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        $this->_init('monogo_weather_history', 'id');
    }
}
