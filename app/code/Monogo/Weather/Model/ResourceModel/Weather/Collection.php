<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Monogo\Weather\Model\Weather;
use Monogo\Weather\Model\ResourceModel\Weather as WeatherResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(Weather::class, WeatherResource::class);
    }
}
