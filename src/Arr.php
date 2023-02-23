<?php

declare(strict_types=1);

namespace Folyod\Helpers;

use Folyod\Helpers\Services\InDeepFinder;

final class Arr
{
    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     */
    public static function get(array &$source, string $key, mixed $default = null): mixed
    {
        return $source[$key] ?? $default;
    }

    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     */
    public static function has(array &$source, string $key): bool
    {
        return isset($source[$key]);
    }

    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     * @param non-empty-string $separator
     */
    public static function getDeep(array &$source, string $key, mixed $default = null, string $separator = '.'): mixed
    {
        return InDeepFinder::find($key, $source, $separator) ?? $default;
    }
}
