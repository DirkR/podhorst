<?php


namespace App\Services;


class DurationStringParser
{

    public static function process(string $duration_string): int
    {
        return (new static())->parse($duration_string);
    }

    public function parse(string $duration_string): int
    {
        $pattern = "/^((?P<d>\d+)d)?((?P<h>\d+)h)?((?P<m>\d+)m)?((?P<s>\d+)s?)?/";
        preg_match($pattern, $duration_string, $matches, PREG_UNMATCHED_AS_NULL);
        $d = intval($matches['d'] ?? 0);
        $h = intval($matches['h'] ?? 0);
        $m = intval($matches['m'] ?? 0);
        $s = intval($matches['s'] ?? 0);

        return $d * 24 * 3600 + $h * 3600 + $m * 60 + $s;
    }
}
