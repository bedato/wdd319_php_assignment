<div class="col-md-8 blog-main">

    <?php


    foreach ($alledaten as $datensatz) { ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>"><?php echo $datensatz['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $datensatz['date'];
                                        echo $datensatz['author']; ?></p>
            <p><?php echo substr($datensatz['content'], 2) . "..."; ?></p>
        </div>
        <div class="comment">
            <h5>John Wick</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa sequi totam magnam aspernatur consectetur! Quibusdam illo perspiciatis quo? Eius, rem?</p>
            <span>20. January</span>
        </div>

    <?php } ?>
    <!-- /.blog-post -->

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>