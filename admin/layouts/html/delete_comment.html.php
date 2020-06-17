<?php
$currentComment = $_GET['comment_id'];
$cmnt_sql = "SELECT * FROM comments WHERE id = $currentComment";
$cmnt_res = mysqli_query($conn, $cmnt_sql);
$cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);
$delete = isset($_POST['delete']) ? $_POST['delete'] : '';
if ($delete) {
    $sql = "DELETE FROM comments WHERE id = $currentComment";
    $delres = mysqli_query($conn, $sql);
    header('location: admin.php?page=posts');
}
?>
<div>
    <h4>Comments: </h4>
    <?php foreach ($cmnt_data as $total_cmnt) { ?>
        <div class="mb-5 pt-2 pb-4 ">
            <h5><?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><?php echo $total_cmnt['timestamp']; ?></span></h5>
            <p class="my-3"><?php echo $total_cmnt['comment_text']; ?></p>
            <form action="" method="post">
                <button name="delete" value="delete">Delete Comment</button>
            </form>
        </div>
        <hr>
    <?php } ?>
</div>