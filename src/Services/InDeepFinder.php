<?php

declare(strict_types=1);

namespace Folyod\Helpers\Services;

final class InDeepFinder
{
    /**
     * @param array<mixed> $source
     * @param non-empty-string $key
     * @param non-empty-string $separator
     */
    public static function find(string $key, array &$source, string $separator = '.'): mixed
    {
        $paths = explode($separator, $key);

        return self::findForKeys($paths, $source);
    }

    /**
     * @param array<mixed> $source
     * @param array<non-empty-string> $keys
     */
    private static function findForKeys(array &$keys, array &$source): mixed
    {
        $key = array_shift($keys);
        if (! isset($source[$key])) {
            return null;
        }
        $value = &$source[$key];
        if (is_array($value)) {
            return self::findForKeys($keys, $value);
        }

        return $value;
    }
}
