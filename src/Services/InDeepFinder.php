<?php

declare(strict_types=1);

namespace Folyod\Helpers\Services;

final class InDeepFinder
{
    /**
     * @param array<mixed> $source
     * @param non-empty-string $separator
     * @param non-empty-string $key
     */
    public static function get(array &$source, string $key, string $separator = '.'): mixed
    {
        $paths = explode($separator, $key);

        return self::getForKeys($source,$paths);
    }

    /**
     * @param array<mixed> $source
     * @param non-empty-string $separator
     * @param non-empty-string $key
     */
    public static function has(array &$source, string $key, string $separator = '.'): bool
    {
        $paths = explode($separator, $key);

        return self::hasForKeys($source,$paths);
    }

    /**
     * @param array<mixed> $source
     * @param array<non-empty-string> $keys
     */
    private static function getForKeys(array &$source, array &$keys): mixed
    {
        $key = array_shift($keys);
        if (! isset($source[$key])) {
            return null;
        }
        $value = &$source[$key];
        if (is_array($value) && count($keys) != 0) {
            return self::getForKeys($value, $keys);
        }

        return $value;
    }

    /**
     * @param array<mixed> $source
     * @param array<non-empty-string> $keys
     */
    private static function hasForKeys(array &$source, array &$keys): bool
    {
        $key = array_shift($keys);
        if (isset($source[$key])) {
            if (count($keys) !== 0) {
                return self::hasForKeys($source[$key], $keys);
            }

            return true;
        }

        return false;
    }
}
