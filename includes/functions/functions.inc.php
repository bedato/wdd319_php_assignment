<?php
function sanitizer($str): string
{
    $cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
    $cleanStr = trim($cleanStr);
    return $cleanStr;
}

function truncate($string, $length = 400, $append = "&hellip;")
{
    $string = trim($string);

    if (strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }

    return $string;
}
