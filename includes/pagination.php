<?php

$sql = "SELECT * FROM `posts`";
$results_per_page = 5;
$res1 = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($res1);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['pg'])) {
    $page_nr = 1;
} else {
    $page_nr = $_GET['pg'];
}

$disabledPrev = '';
if ($page_nr == 1) {
    $disabledPrev = 'disabled';
}


$this_page_first_result = ($page_nr - 1) * $results_per_page;

$sql = "SELECT * FROM `posts` LIMIT " . $this_page_first_result . ',' . $results_per_page;
$res1 = mysqli_query($conn, $sql);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}
$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);
