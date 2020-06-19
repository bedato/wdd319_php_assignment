<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php"><i class="fab fa-microblog"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <?php foreach ($mainNav as $navItem) {
                $menuStatus = '';
                if ($page == $navItem['link']) {
                    $menuStatus = 'active';
                }
            ?>
                <li class="nav-item <?php echo $menuStatus; ?>">
                    <a class="nav-link" href="home.php?page=<?php echo $navItem['link']; ?>"><?php echo $navItem['title']; ?></a>
                </li>
            <?php } ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="home.php?page=search" method="POST">
            <input class="form-control mr-sm-2" id="searchPosts" type="text" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" id="searchPostsBtn" type="submit" disabled="true" name="submit-search">Search</button>
        </form>
    </div>
</nav>