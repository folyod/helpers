<?php

declare(strict_types=1);

namespace Folyod\Helpers;

use Folyod\Helpers\Exceptions\ServiceException;
use Folyod\Helpers\Services\Str\StrReplacer;
use Stringable;

final readonly class UnsafeStr
{
    /**
     * @throws ServiceException
     * @see    Str::replace()
     */
    public static function replace(string &$source, string|Stringable|int &$pattern, string|Stringable|int &$replace): string
    {
        return StrReplacer::replace($source, $pattern, $replace);
    }

    /**
     * @param array<string, string|Stringable|int> $replaces
     * @throws ServiceException
     * @see    Str::replaceAll()
     */
    public static function replaceAll(string &$source, array &$replaces): string
    {
        $replaced = $source;
        foreach ($replaces as $pattern => $replace) {
            $replaced = StrReplacer::replace($replaced, $pattern, $replace);
        }

        return $replaced;
    }
}
