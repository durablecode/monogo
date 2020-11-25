<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Metric
 * @package Monogo\Weather\Model\Provider
 */
class Units implements OptionSourceInterface
{
    /**
     * {@inheritDoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => __('Standard'),
                'value' => 'standard',
            ],
            [
                'label' => __('Metric'),
                'value' => 'metric',
            ],
            [
                'label' => __('Imperial'),
                'value' => 'imperial',
            ]
        ];
    }
}
