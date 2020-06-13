<?php require_once('includes/delete_account.inc.php'); ?>

<div class="col-md-8 blog-main">
    <h1 class="mb-4">Delete Account</h1>
    <div class="py-4">
        <p>WARNING! this can't be undone!</p>
        <p>If you want to rejoin the blog you would need a new account! To delete your account write down your username and submit it with the button.</p>
    </div>
    <form method="POST">
        <h3 class=" text-danger my-3">Enter your Username to delete your account: </h3>
        <div class="form-group">
            <label for="delete_user" class="text-danger">Username:</label><br>
            <input type="text" name="delete_user" id="delete_user" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="delete_acc" class="btn btn-danger btn-md" value="DELETE">
        </div>
</div>