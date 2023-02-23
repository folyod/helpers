<?php

declare(strict_types=1);

namespace Test;

use Folyod\Helpers\Arr;
use PHPUnit\Framework\TestCase;

final class ArrayHelperTest extends TestCase
{
    public function testGetInDeep()
    {
        $arr = [
            'first' => [
                'second' => [
                    'third' => 'value',
                    'third_2' => 'value_2',
                    'fourth' => [
                        'value',
                    ]
                ]
            ]
        ];

        $this->assertSame(Arr::getDeep( $arr, 'first.second.third'), 'value');
    }
}
