<div class="col-md-12">

    <?php


    foreach ($alledaten as $datensatz) { ?>
        <a class="text-dark" href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
            <div class="card p-5  my-3">
                <h1 class="card-title"><?php echo $datensatz['title']; ?>
                </h1>
                <p class="card-text"><?php echo $datensatz['author']; ?></p>
                <p><?php echo $datensatz['content']; ?></p>
                <span class="text-italic text-muted"><?php echo $datensatz['date']; ?></span>
            </div>
        </a>
    <?php } ?>
    <!-- /.blog-post -->

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>