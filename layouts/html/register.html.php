<?php require_once('includes/register.inc.php');
?>

<div class="col-md-8 my-3" id="register">
    <div class="container">
        <div id="register-row" class="">
            <div id="register-column" class="col-md-12">
                <div id="register-box" class="col-md-12">
                    <form id="registerForm" class="form" action="" method="POST" data-parsley-validate="">
                        <h1 class="mb-5 pb-2">Register</h1>
                        <?php
                        if (isset($successmessage)) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo $successmessage;
                            echo '</div>';
                        }
                        ?>
                        <div class="form-group">
                            <label for="input_username" class="text-dark">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $inputUsername ?>" placeholder="Username" required="" data-parsley-required-message="Please enter a username"">
                        </div>
                        <div class=" form-group">
                            <label for="input_email" class="text-dark">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" value="<?= $inputEmail ?>" placeholder="Email" required="" data-parsley-trigger="change" data-parsley-required-message="Please enter your email">
                        </div>
                        <div class=" form-group">
                            <label for="input_pw" class="text-dark">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Must have at least 6 characters" required="" data-parsley-required-message="Please enter your password">
                        </div>
                        <div class="form-group">
                            <label for="input_pw" class="text-dark">Confirm Password:</label><br>
                            <input type="password" name="confirm_password" id="password" class="form-control" placeholder="Confirm password" required="" data-parsley-required-message="Please repeat your password">
                        </div>
                        <?php
                        if (count($errormsg) > 0) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo implode('<br>', $errormsg);
                            echo '</div>';
                        }
                        ?>
                        <div class="form-group my-5 pt-2">
                            <input type="submit" name="submit" class="btn btn-dark btn-block py-3" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>