<?php

/**
 * @param string $str Takes string as parameter to sanitize it so that there can't be any html code injected.
 */
function sanitizer($str): string
{
    $cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
    $cleanStr = trim($cleanStr);
    return $cleanStr;
}

/**
 * @param string $string, $length This function cuts a long text to have a total length of 400 characters and appends (...). Used to have a unified text length on previews
 */
function truncate($string, $length = 400, $append = "&hellip;"): string
{
    $string = trim($string);

    if (strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }

    return $string;
}


/**
 * @param array $page, $conn Used to get the sql table data from the prefered table.
 */
function pageQuery($page, $conn): array
{
    $sqlC = "SELECT * FROM `pages` WHERE `page` = '$page'";
    $result = mysqli_query($conn, $sqlC);
    if ($result === false) {
        echo 'MYSQL Fehler ' . mysqli_info($conn);
    }
    $contents = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $contents;
}
