<?php
$currentComment = $_GET['comment_id'];
$cmnt_sql = "SELECT * FROM comments WHERE id = $currentComment";
$cmnt_res = mysqli_query($conn, $cmnt_sql);
$cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);
$delete = isset($_POST['delete']) ? $_POST['delete'] : '';
if ($delete) {
    $sql = "DELETE FROM comments WHERE id = $currentComment";
    $delres = mysqli_query($conn, $sql);
    header('location: admin.php?page=comment_delete_successful');
}
?>
<div>
    <?php foreach ($cmnt_data as $total_cmnt) { ?>
        <div class="jumbotron mb-5 pt-2 pb-4 ">
            <h1 class="display-4">Delete Comment:</h1>
            <h3 class="display-5 my-5">Are you sure you want to delete this post? It can't be undone</h3>
            <h5 class="mt-5">Comment Author: </h5>
            <?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><?php echo $total_cmnt['timestamp']; ?></span>
            <h5 class="mt-5">Comment Content: </h5>
            <p class="my-3"><?php echo $total_cmnt['comment_text']; ?></p>
            <form method="post">
                <button name="delete" class="my-5 text-light btn btn-default btn-lg bg-danger" value="delete">Delete Comment</button>
            </form>
        </div>
        <hr>
    <?php } ?>
</div>