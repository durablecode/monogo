<?php
declare(strict_types=1);

namespace Monogo\Weather\Test\Api;

use Magento\TestFramework\TestCase\WebapiAbstract;
use Magento\Framework\Webapi\Rest\Request;

/**
 * Class WeatherTest
 * @package Monogo\Weather\Test\Api
 */
class WeatherTest extends WebapiAbstract
{
    /**
     * Tested Url webapi
     */
    private const URL = '/V1/weather/current';

    /**
     * Erorr test
     * @return void
     */
    public function testError(): void
    {
        $response = $this->_webApiCall($this->getServiceInformation(), ['q' => 'Wałbrzych,pl']);
        $errorCode = current($response);
        $this->assertEquals(400, $errorCode);
    }

    /**
     * Get request service information
     *
     * @return array[]
     */
    private function getServiceInformation(): array
    {
        return [
            'rest' => [
                'resourcePath' => self::URL,
                'httpMethod' => Request::HTTP_METHOD_GET,
            ]
        ];
    }
}
