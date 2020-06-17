<div class="col-md-12">
    <div class="mb-5">
        <h1>Blog posts</h1>
        <p>Click on an post that interrests you!</p>
    </div>

    <?php foreach ($alledaten as $datensatz) { ?>
        <a class="text-dark" href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
            <div class="card p-5  my-3 postCard rounded">
                <h1 class="card-title"><?php echo $datensatz['title']; ?>
                </h1>
                <p class="card-text"><?php echo $datensatz['author']; ?></p>
                <p class="textContent"><?php echo truncate($datensatz['intro_text']) ?></p>
                <span class="text-italic text-muted"><?php echo $datensatz['date']; ?></span>
            </div>
        </a>
    <?php } ?>
    <!-- /.blog-post -->

    <form class="blog-pagination" method="GET">
        <button class="btn btn-outline-dark text-light" name="page_nr"><a href="home.php?page=posts&page_nr=<?php echo $back ?>">Older</a></button>
        <button class="btn btn-outline-dark text-light" name="page_nr"><a href="home.php?page=posts&page_nr=<?php echo $next ?>">Newer</a></button>
    </form>