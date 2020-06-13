<?php require_once('includes/register.inc.php');
?>

<div class="col-md-8 my-3" id="register">
    <div class="container">
        <div id="register-row" class="">
            <div id="register-column" class="col-md-6">
                <div id="register-box" class="col-md-12">
                    <form id="register-form" class="form" action="" method="POST">
                        <h1 class="mb-4">Register</h1>
                        <div class="form-group">
                            <label for="input_username" class="text-dark">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $inputUsername ?>" placeholder="Username"">
                        </div>
                        <div class=" form-group">
                            <label for="input_username" class="text-dark">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" value="<?= $inputEmail ?>" placeholder="Email"">
                        </div>
                        <div class=" form-group">
                            <label for="input_pw" class="text-dark">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Must have at least 6 characters">
                        </div>
                        <div class="form-group">
                            <label for="input_pw" class="text-dark">Confirm Password:</label><br>
                            <input type="password" name="confirm_password" id="password" class="form-control" placeholder="Confirm password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-dark btn-block" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>