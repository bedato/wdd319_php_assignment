<?php
function sanitizer($str): string
{
    $cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
    $cleanStr = trim($cleanStr);
    return $cleanStr;
}
