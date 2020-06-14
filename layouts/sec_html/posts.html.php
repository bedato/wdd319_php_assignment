<div class="col-md-12">

    <?php


    foreach ($alledaten as $datensatz) { ?>
        <a class="text-dark" href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
            <div class="card p-5  my-3">
                <h1 class="card-title"><?php echo $datensatz['title']; ?>
                </h1>
                <p class="card-text"><?php echo $datensatz['author']; ?></p>
                <p class="textContent"><?php echo $datensatz['content']; ?></p>
                <span class="text-italic text-muted"><?php echo $datensatz['date']; ?></span>
            </div>
        </a>
    <?php } ?>
    <!-- /.blog-post -->

    <form class="blog-pagination" method="$_GET">
        <button class="btn btn-outline-dark" name="page_nr"><a href="home.php?page=posts&page_nr=<?php echo $back ?>">Older</a></button>
        <button class="btn btn-outline-dark" name="page_nr"><a href="home.php?page=posts&page_nr=<?php echo $next ?>">Newer</a></button>
    </form>