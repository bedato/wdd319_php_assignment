<?php
$limit = 5;
$page_nr = isset($_GET['page_nr']) ? $_GET['page_nr'] : 1;
$start = ($page_nr - 1) * $limit;
$sql = "SELECT * FROM `posts` LIMIT $start, $limit";
$res1 = mysqli_query($conn, $sql);

$sql2 = "SELECT count(id) AS id FROM `posts`";
$res2 = mysqli_query($conn, $sql2);
$postCount = mysqli_fetch_all($res2, MYSQLI_ASSOC);
$total = $postCount[0]['id'];
$post_nrs = ceil($total / $limit); //max amount of posts

$next = $page_nr + 1;
$back = $page_nr - 1;

if ($next > $post_nrs) {
    $next = 1;
}

if ($back < 1) {
    $back = $post_nrs;
}

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);
