<?php

/**
 * There where some complications on the concept of seperating html and php files on this to
 * to have the articles shown dynamically and with prep stmnts.
 * So this "html" file works like an all-in-one solution: it gets dynamically the article with the get param,
 * selects the article with prep stmnts and loads the html files for the article, comments in the page.
 * this includes the comments and the comment section with their functions
 */
$currentArticle = $_GET['post_id'];
//print_r($currentArticle);
//get article with prepared statements
$art_sql = "SELECT * FROM posts WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $art_sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "i", $currentArticle);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    //print_r($row);

    //load in the html with the data from the prepared statement
    include('layouts/secLayouts/blog_article.php');

    //load in comments which belong to the post, comment_id matches article id
    $cmnt_sql = "SELECT * FROM comments WHERE comment_id = $currentArticle";
    $cmnt_res = mysqli_query($conn, $cmnt_sql);
    $cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);

    include('layouts/secLayouts/comments.php');

    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $timestamp = date("Y-m-d H:i:s");
    $errormessages = array();
    $readyToSend = true;

    //comment function with the sanitizing function
    if (isset($comment)) {
        sanitizer($comment);

        if (empty($comment)) {
            $errormessages[] = 'Please enter your comment';
            $readyToSend = false;
        }
    } else {
        $readyToSend = false;
    }

    if ($readyToSend == true) {
        $sql = "INSERT INTO `comments` (`id`, `username`, `comment_text`, `comment_id`, `timestamp`) VALUES (NULL, ?, ?, ?, ?);";

        $cmnt_stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($cmnt_stmt, $sql)) {
            echo "SQL error";
        } else {
            //insert comment into table
            mysqli_stmt_bind_param($cmnt_stmt, "ssis", $_SESSION['username'], $comment, $currentArticle, $timestamp);
            mysqli_stmt_execute($cmnt_stmt);
        }
    }
    include('layouts/secLayouts/write_comment.php');
}
