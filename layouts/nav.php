<?php require_once('includes/login.inc.php'); ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><i class="fab fa-microblog"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto ">
            <?php foreach ($mainNav as $navItem) {
                $menuStatus = '';
                if ($page == $navItem['link']) {
                    $menuStatus = 'active';
                }
            ?>
                <li class="nav-item <?php echo $menuStatus; ?>">
                    <a class="nav-link" href="index.php?page=<?php echo $navItem['link']; ?>"><?php echo $navItem['title']; ?></a>
                </li>

            <?php } ?>
        </ul>
        <ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </a>
                <div class="dropdown-menu p-4 w-100">
                    <h3 class="mb-3">Login: </h1>
                        <form class="form-horizontal" method="post" accept-charset="UTF-8" data-parsley-validate="" id="loginForm">
                            <input type="text" name="username" id="username" class="form-control mb-3" placeholder="Username" required="" data-parsley-required-message="Enter your username">
                            <input type="password" name="userpasswort" id="password" class="form-control my-3" placeholder="Password" required="" data-parsley-required-message="Enter your password">
                            <input type="submit" id="sendLoginForm" name="submit" class="btn btn-dark btn-block" value="Login">
                        </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=register">Register</a>
            </li>
        </ul>
    </div>
</nav>
<?php
if ($error == true && count($errormessages) > 0) {
    echo '<div class="alert alert-danger" role="alert">';
    echo implode('<br>', $errormessages);
    echo '</div>';
} ?>