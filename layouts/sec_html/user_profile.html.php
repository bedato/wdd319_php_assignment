<?php require_once('includes/account_settings.inc.php'); ?>

<div class="col-md-8 blog-main">
    <h1 class="mb-4">Hello, <?php echo $_SESSION['username']; ?></h1>
    <div class="py-4">
        <p>Welcome to your Profile Page!</p>
        <p>You can change your username and/or password Note that at any changes you need to re-login</p>
    </div>

    <form method="POST" id="changeUsername" data-parsley-validate="">
        <h3 class=" text-dark my-3">Change your Username: </h3>
        <div class="form-group">
            <label for="username" class="text-dark">New Username:</label><br>
            <input type="text" name="username_new" id="username" class="form-control" required="" data-parsley-required-message="Please enter your new name">
        </div>
        <div class="form-group">
            <input type="submit" name="change" class="btn btn-dark btn-md" value="Submit">
        </div>
    </form>

    <form method="POST" data-parsley-validate="" id="changeUserpw">
        <h3 class=" text-dark my-3">Change your Password: </h3>
        <div class="form-group">
            <label for="input_pw" class="text-dark">Old Password:</label><br>
            <input type="password" name="old_pw" id="input_pw" class="form-control" required="" data-parsley-required-message="Please enter your current password">
        </div>
        <div class="form-group">
            <label for="input_pw_new" class="text-dark">New Password:</label><br>
            <input type="password" name="new_pw" id="input_pw_new" class="form-control" required="" data-parsley-required-message="Please enter your new password">
        </div>
        <div class="form-group">
            <input type="submit" name="change_pw" class="btn btn-dark btn-md" value="Change">
        </div>
    </form>

    <div id="delete-account" class="my-5">
        <p>You can Delete your Account here. We will delete all your data on our Databases. <strong> Account can't get recovered</strong></p>
        <a href="home.php?page=delete_acc" class="text-danger">Delete Account</a>
    </div>
</div>