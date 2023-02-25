<?php

declare(strict_types=1);

namespace Folyod\Helpers;

use Folyod\Helpers\Services\InDeepFinder;

final readonly class UnsafeArr
{
    /**
     * @see Arr::has()
     *
     * @param array<mixed>     $source
     * @param non-empty-string $key
     * @param non-empty-string $separator
     */
    public static function has(array &$source, string $key, string $separator = '.'): bool
    {
        return InDeepFinder::has($source, $key, $separator);
    }

    /**
     * @see Arr::get()
     *
     * @param array<mixed>     $source
     * @param non-empty-string $key
     * @param non-empty-string $separator
     */
    public static function get(array &$source, string $key, mixed $default = null, string $separator = '.'): mixed
    {
        return InDeepFinder::get($source, $key, $separator) ?? $default;
    }
}
