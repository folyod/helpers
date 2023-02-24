<?php

declare(strict_types=1);

namespace Folyod\Helpers;

final readonly class Arr
{
    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     */
    public static function get(array $source, string $key, mixed $default = null): mixed
    {
        return UnsafeArr::get($source, $key, $default);
    }

    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     */
    public static function has(array $source, string $key): bool
    {
        return UnsafeArr::has($source, $key);
    }

    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     * @param non-empty-string $separator
     */
    public static function getDeep(array $source, string $key, mixed $default = null, string $separator = '.'): mixed
    {
        return UnsafeArr::getDeep($source, $key, $default, $separator);
    }
}
