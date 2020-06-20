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
    include('layouts/edit_article.php');

    $cmnt_sql = "SELECT * FROM comments WHERE comment_id = $currentArticle";
    $cmnt_res = mysqli_query($conn, $cmnt_sql);
    $cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);

    //comment section:
?>
    <div class="container">
        <h3 class="mb-5 mt-3">Delete Comments: </h3>
        <?php foreach ($cmnt_data as $total_cmnt) {
            $timestamp = $total_cmnt['timestamp'];
            $timestamp = date("d/m/Y", strtotime($timestamp));
        ?>
            <div class="card">
                <h5 class="card-header"><?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><small><?php echo $timestamp ?></small></span></h5>
                <div class="card-body">
                    <p class="card-text"><?php echo $total_cmnt['comment_text']; ?></p>
                    <a href="admin.php?page=delete_comment&comment_id=<?php echo $total_cmnt['id']; ?>">Delete Comment</a>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>
<?php } ?>