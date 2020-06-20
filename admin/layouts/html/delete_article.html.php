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
    header('location: admin.php?page=article_del_successful');
}
?>
<div>
    <?php foreach ($post_data as $total_post) { ?>

        <div class="jumbotron mb-5 pt-2 pb-4 ">
            <h1 class="display-4">Delete Post</h1>
            <h3 class="display-5 my-5">Are you sure you want to delete this post? It can't be undone</h3>
            <h5 class="mt-5">Post Title: </h5>
            <span> <?php echo $total_post['title'] . " "; ?> </span>
            <h5 class="mt-5">By Author: </h5><span class="font-italic text-muted"><?php echo $total_post['author']; ?></span>
            <h5 class="mt-5">Intro Text: </h5>
            <p><?php echo $total_post['intro_text']; ?></p>
            <form method="post">
                <button name="delete" class="my-5 text-light btn btn-default btn-lg bg-danger" value="delete">Delete Post</button>
            </form>
        </div>
        <hr>

    <?php } ?>
</div>