<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
    <a class="navbar-brand" href="admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=posts">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=users">Users</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Public
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin.php?page=edit_welcome">Welcome</a>
                    <a class="dropdown-item" href="admin.php?page=edit_pb_header">Header</a>
                    <a class="dropdown-item" href="admin.php?page=edit_about">About</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Private
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin.php?page=edit_pv_header">Header</a>
                </div>
            </li>
        </ul>
        <div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item bg-danger rounded">
                    <a class="nav-link" href="admin.php?page=logout"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>