<?php

namespace App\Helpers;

use Illuminate\Support\Str;

function makePlural($word, $count): string
{
    return $count." ".Str::of(
            $word
        )->plural($count);
}

function getLastSegment($string)
{
    $segments = explode(
        "\\",
        $string
    );

    return end($segments);
}
