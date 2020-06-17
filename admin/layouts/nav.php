<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=posts">Posts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Public
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin.php?page=welcome">Welcome</a>
                    <a class="dropdown-item" href="#">Header</a>
                    <a class="dropdown-item" href="#">About</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Private
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Header</a>
                    <a class="dropdown-item" href="#">Post Container</a>
                </div>
            </li>
        </ul>
    </div>
</nav>