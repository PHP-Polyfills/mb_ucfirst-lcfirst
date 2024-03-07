<?php

/**
 * Make a string's first character uppercase multi-byte safely.
 */
function mb_ucfirst(string $string, ?string $encoding = null): string {
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $firstChar = mb_convert_case($firstChar, MB_CASE_TITLE, $encoding);

    return $firstChar . mb_substr($string, 1, null, $encoding);
}

/**
 * Make a string's first character lowercase multi-byte safely.
 */
function mb_lcfirst(string $string, ?string $encoding = null): string {
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $firstChar = mb_convert_case($firstChar, MB_CASE_LOWER, $encoding);

    return $firstChar . mb_substr($string, 1, null, $encoding);
}
