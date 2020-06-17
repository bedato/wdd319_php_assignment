<?php
$currentArticle = $_GET['post_id'];
//print_r($currentArticle);
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

    include('layouts/edit_article.php');

    $cmnt_sql = "SELECT * FROM comments WHERE comment_id = $currentArticle";
    $cmnt_res = mysqli_query($conn, $cmnt_sql);
    $cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);
?>
    <div>
        <h4>Comments: </h4>
        <?php foreach ($cmnt_data as $total_cmnt) { ?>
            <div class="mb-5 pt-2 pb-4 ">
                <h5><?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><?php echo $total_cmnt['timestamp']; ?></span></h5>
                <p class="my-3"><?php echo $total_cmnt['comment_text']; ?></p>
                <a href="admin.php?page=delete_comment&comment_id=<?php echo $total_cmnt['id']; ?>">Delete Comment</a>
            </div>
            <hr>
        <?php } ?>
    </div>
<?php } ?>