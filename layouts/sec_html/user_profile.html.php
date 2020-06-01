<?php require_once('includes/account_settings.inc.php'); ?>

<div class="col-md-8 blog-main">
    <h1 class="mb-4">Hello, <?php echo $_SESSION['username']; ?></h1>
    <p>Welcome to your Profile Page!</p>
    <p>You can change your username and/or password Note that at any changes you need to re-login</p>

    <form method="POST">
        <h3 class=" text-info my-3">Change your Username: </h3>
        <div class="form-group">
            <label for="change_username" class="text-info">New Username:</label><br>
            <input type="text" name="username_new" id="username" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="change" class="btn btn-info btn-md" value="submit">
        </div>
    </form>
    <form method="POST">
        <h3 class=" text-info my-3">Change your Password: </h3>
        <div class="form-group">
            <label for="input_pw" class="text-info">Old Password:</label><br>
            <input type="password" name="old_pw" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="input_pw" class="text-info">New Password:</label><br>
            <input type="password" name="new_pw" id="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="change_pw" class="btn btn-info btn-md" value="change">
        </div>
    </form>
    <div id="delete-account" class="my-5">
        <p>You can Delete your Account here. We will delete all your data on our Databases. <strong> Account can't get recovered</strong></p>
        <a href="home.php?page=delete_acc" class="text-info">Delete Account</a>
    </div>
</div>