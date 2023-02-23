<?php

declare(strict_types=1);

namespace Folyod\Helpers;

use Folyod\Helpers\Services\InDeepFinder;

final class Arr
{
    public static function get(array &$source, string $key, mixed $default = null): mixed
    {
        return $source[$key] ?? $default;
    }

    public static function has(array &$source, string $key): bool
    {
        return isset($source[$key]);
    }

    public static function getDeep(array &$source, string $key, mixed $default = null, string $separator = '.'): mixed
    {
        return InDeepFinder::find($key, $source, $separator) ?? $default;
    }
}
