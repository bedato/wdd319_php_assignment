<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>
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