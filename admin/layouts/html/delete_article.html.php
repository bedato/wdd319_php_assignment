<?php
$currentArticle = $_GET['post_id'];
$post_sql = "SELECT * FROM posts WHERE id = $currentArticle";
$post_res = mysqli_query($conn, $post_sql);
$post_data = mysqli_fetch_all($post_res, MYSQLI_ASSOC);
$delete = isset($_POST['delete']) ? $_POST['delete'] : '';
if ($delete) {
    $sqlcmnt = "DELETE FROM comments WHERE comment_id = $currentArticle";
    $cmntres = mysqli_query($conn, $sqlcmnt);
    $sql = "DELETE FROM posts WHERE id = $currentArticle";
    $delres = mysqli_query($conn, $sql);
    header('location: admin.php?page=posts');
}
?>
<div>
    <h4>Comments: </h4>
    <?php foreach ($post_data as $total_post) { ?>
        <div class="mb-5 pt-2 pb-4 ">
            <h1>Delete Post</h1>
            <h3>Are you sure you want to delete this post? It can't be undone</h3>
            <h5><?php echo $total_post['title'] . " "; ?> <span class="font-italic text-muted"><?php echo $total_post['author']; ?></span></h5>
            <p class="my-3"><?php echo $total_post['intro_text']; ?></p>
            <form action="" method="post">
                <button name="delete" value="delete">Delete Post</button>
            </form>
        </div>
        <hr>
    <?php } ?>
</div>