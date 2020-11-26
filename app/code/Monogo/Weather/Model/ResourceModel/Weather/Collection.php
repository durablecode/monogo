<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Monogo\Weather\Model\Weather;
use Monogo\Weather\Model\ResourceModel\Weather as WeatherResource;

/**
 * Class Collection
 * @package Monogo\Weather\Model\ResourceModel\Weather
 */
class Collection extends AbstractCollection
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(Weather::class, WeatherResource::class);
    }
}
