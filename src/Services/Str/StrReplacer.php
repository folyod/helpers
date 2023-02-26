<?php

declare(strict_types=1);

namespace Folyod\Helpers\Services\Str;

use Folyod\Helpers\Exceptions\ServiceException;

final class StrReplacer
{
    /**
     * @throws ServiceException
     */
    public static function replace(string &$source, string|int &$pattern, string|int &$replace): string
    {
        $pos = mb_strpos($source, (string) $pattern);
        if (! $pos) {
            throw new ServiceException(
                sprintf(
                    "The key %s not found in string for replace",
                    $pattern
                )
            );
        }
        $replacedLength = mb_strlen((string) $pattern);

        return mb_substr($source, 0, $pos)
            . $replace
            . mb_substr($source, $pos + $replacedLength);
    }
}
