<?php

declare(strict_types=1);

namespace Test;

use Folyod\Helpers\Arr;
use PHPUnit\Framework\TestCase;

final class ArrayHelperTest extends TestCase
{
    /**
     * @dataProvider arrayDataProvider
     */
    public function testGet(array $source, string $key, mixed $expected)
    {
        $this->assertSame(Arr::get($source, $key), $expected);
    }

    /**
     * @dataProvider arrayDataProvider
     */
    public function testHas(array $source, string $key, mixed $expected)
    {
        $this->assertSame(Arr::has($source, $key), (bool) $expected);
    }

    public static function arrayDataProvider(): array
    {
        return [
            [
                [
                    'first' => [
                        'second' => [
                            'third' => 'value',
                            'third_2' => 'value_2',
                            'fourth' => [
                                'value',
                            ]
                        ]
                    ]
                ],
                'first.second.third',
                'value'
            ],
            [
                [
                    'first' => [
                        'second' => [
                            'third' => 'value',
                            'third_2' => 'value_2',
                            'fourth' => [
                                'value',
                            ]
                        ]
                    ]
                ],
                'first.second.fifth',
                null
            ],
            [
                [
                    'first' => [
                        'second' => [
                            'third' => 'value',
                            'third_2' => 'value_2',
                            'fourth' => [
                                'value',
                            ]
                        ]
                    ]
                ],
                'first',
                [
                    'second' => [
                        'third' => 'value',
                        'third_2' => 'value_2',
                        'fourth' => [
                            'value',
                        ]
                    ]
                ]
            ]
        ];
    }
}
