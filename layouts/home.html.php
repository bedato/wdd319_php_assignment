<div class="col-md-8 blog-main">
    <?php foreach ($alledaten as $datensatz) { ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $datensatz['title']; ?></h2>
            <p class="blog-post-meta"><?php echo $datensatz['date'];
                                        echo $datensatz['author']; ?></p>
            <p><?php echo $datensatz['content']; ?></p>
            <hr>
        </div>

    <?php } ?>
    <!-- /.blog-post -->

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div>