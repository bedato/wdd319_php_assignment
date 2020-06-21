<?php
//Delete article security mesurment to ask the user if he is sure to delete the comment
$currentUser = $_GET['user_id'];
$user_sql = "SELECT * FROM users WHERE id = $currentUser";
$user_res = mysqli_query($conn, $user_sql);
$user_data = mysqli_fetch_all($user_res, MYSQLI_ASSOC);
$delete = isset($_POST['delete']) ? $_POST['delete'] : '';

//if the delete POST data is set the sql prompts will trigger to delete the selected post
if ($delete) {
    $sql = "DELETE FROM users WHERE id = $currentUser";
    $delres = mysqli_query($conn, $sql);
    header('location: admin.php?page=comment_delete_successful');
}
?>
<div>
    <?php foreach ($user_data as $total_user) { ?>
        <div class="jumbotron mb-5 pt-2 pb-4 ">
            <h1 class="display-4">Delete User:</h1>
            <h3 class="display-5 my-5">Are you sure you want to delete this user? It can't be undone</h3>
            <h5 class="mt-5">Username: </h5>
            <?php echo $total_user['username']; ?>
            <h5 class="mt-5">User Email: </h5>
            <p class="my-3"><?php echo $total_user['email']; ?></p>
            <form method="post">
                <button name="delete" class="my-5 text-light btn btn-default btn-lg bg-danger" value="delete">Delete User</button>
            </form>
        </div>
        <hr>
    <?php } ?>
</div>