<?php

/**
 * @param string $string, $length This function cuts a long text to have a total length of 400 characters and appends (...). Used to have a unified text length on previews
 */
function truncate($string, $length = 200, $append = "&hellip;"): string
{
    $string = trim($string);

    if (strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }

    return $string;
}
