<?php require_once('includes/login.inc.php');
?>

<div class="col-md-8 my-3 pb-5" id="login">
    <div class="container">
        <div id="login-row" class="">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form mb-5" action="" method="POST">
                        <h1 class="mb-4">Login</h1>
                        <div class="form-group">
                            <label for="input_username" class="text-dark">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="input_pw" class="text-dark">Password:</label><br>
                            <input type="password" name="userpasswort" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" name="submit" class="btn btn-dark btn-block" value="submit">
                        </div>
                        <div id="register-link" class="my-5">
                            <a href="#" class="text-primary">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>