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