<?php

declare(strict_types=1);

namespace Folyod\Helpers;

use Folyod\Helpers\Exceptions\ServiceException;
use Stringable;

final readonly class Str
{
    /**
     * @throws ServiceException
     */
    public static function replace(string $source, string|Stringable|int $pattern, string|int $replace): string
    {
        return UnsafeStr::replace($source, $pattern, $replace);
    }

    /**
     * @param array<string, string|Stringable|int> $replaces
     * @throws ServiceException
     */
    public static function replaceAll(string $source, array $replaces): string
    {
        return UnsafeStr::replaceAll($source, $replaces);
    }
}
