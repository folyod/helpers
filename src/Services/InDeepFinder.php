<?php

declare(strict_types=1);

namespace Folyod\Helpers\Services;

final class InDeepFinder
{
    public static function find(string $key, array &$source, string $separator): mixed
    {
        $paths = explode($separator, $key);

        return self::findForKeys($paths, $source);
    }

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
