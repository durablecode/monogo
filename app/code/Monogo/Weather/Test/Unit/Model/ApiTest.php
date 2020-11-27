<?php
declare(strict_types=1);

namespace Monogo\Weather\Test\Unit\Model;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use Magento\Framework\Serialize\Serializer\Json;
use Monogo\Weather\Model\Provider\Config\OpenWeatherMap;
use Monogo\Weather\Model\Api;

/**
 * Class ApiTest
 * @package Monogo\Weather\Test\Unit\Model
 */
class ApiTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $openWeatherMapConfigMock;

    /**
     * @var MockObject
     */
    private $jsonMock;

    /**
     * @var object
     */
    private $object;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->openWeatherMapConfigMock = $this->getMockBuilder(OpenWeatherMap::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->jsonMock = $this->getMockBuilder(Json::class)
            ->disableOriginalConstructor()
            ->getMock();

        $objectManagerHelper = new ObjectManagerHelper($this);
        $this->object = $objectManagerHelper->getObject(
            Api::class,
            [
                'openWeatherMapConfig' => $this->openWeatherMapConfigMock,
                'json' => $this->jsonMock
            ]
        );
    }

    /**
     * Check if url to API is set up correct
     */
    public function testGetConnectionUrl(): void
    {
        $this->openWeatherMapConfigMock
            ->expects($this->any())
            ->method('getApiKey')
            ->willReturn('test_api_key');

        $this->assertEquals('http://api.openweathermap.org/data/2.5/weather?appid=test_api_key', $this->object->getConnectionUrl());
    }

    /**
     * Check value request when the code is 200
     */
    public function testBodySuccess(): void
    {
        $this->jsonMock
            ->expects($this->any())
            ->method('unserialize')
            ->withAnyParameters()
            ->will($this->returnCallback(function() {
                return ['cod' => 200];
            }));

        $this->assertNotEmpty($this->object->getBody());
    }

    /**
     * Check value request when the code is 200
     */
    public function testBodyFail(): void
    {
        $this->jsonMock
            ->expects($this->any())
            ->method('unserialize')
            ->withAnyParameters()
            ->will($this->returnCallback(function() {
                return ['cod' => 400, 'message' => 'error'];
            }));

        $this->assertNull($this->object->getBody());
    }

    /**
     * @dataProvider paramsProvider
     */
    public function testBuildUrl($params, $expectedResult): void
    {
        $this->openWeatherMapConfigMock
            ->expects($this->any())
            ->method('getApiKey')
            ->willReturn('test_api_key');

        $this->assertEquals($expectedResult, $this->object->buildUrl($params));
    }

    /**
     * @return array[]
     */
    public function paramsProvider(): array
    {
        return [
            [
                [
                    [
                        'q', 'Wałbrzych,pl',
                    ],
                    [
                        'lang', 'pl'
                    ]
                ],
                'http://api.openweathermap.org/data/2.5/weather?appid=test_api_key&q=Wałbrzych,pl&lang=pl',
            ],
            [
                [
                    [
                        'units', 'metric',
                    ]
                ],
                'http://api.openweathermap.org/data/2.5/weather?appid=test_api_key&units=metric'
            ]
        ];
    }
}
