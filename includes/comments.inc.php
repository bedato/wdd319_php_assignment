<?php
//
$errorm = [];
$commentsent = isset($_POST['comment']);

$commentname = '';
$comment = '';
$postId = '';

if ($commentsent == true) {
    $commentname = $_SESSION['username'];
    $comment = $_POST['comment'];

    $comment = strip_tags($comment);
}
