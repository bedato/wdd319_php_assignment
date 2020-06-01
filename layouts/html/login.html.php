<?php require_once('includes/login.inc.php');
?>

<div class="col-md-8 my-3" id="login">
    <div class="container">
        <div id="login-row" class="">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="POST">
                        <h3 class=" text-info my-3">Login</h3>
                        <div class="form-group">
                            <label for="input_username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input_pw" class="text-info">Password:</label><br>
                            <input type="password" name="userpasswort" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                        <div id="register-link" class="my-5">
                            <a href="#" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>