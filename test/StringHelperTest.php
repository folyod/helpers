<?php

declare(strict_types=1);

namespace Test;

use Folyod\Helpers\Str;
use PHPUnit\Framework\TestCase;

final class StringHelperTest extends TestCase
{
    public function testReplaceAllString()
    {
        $replaced = [
            ':type:' => 'string',
            ':max:' => 10,
            ':actual:' => 15,
        ];

        $string = 'Expect integer, :type: given. Expect max length :max:, :actual: given';

        $replacedString = Str::replaceALl($string, $replaced);
        $this->assertSame($replacedString, 'Expect integer, string given. Expect max length 10, 15 given');
    }
}
