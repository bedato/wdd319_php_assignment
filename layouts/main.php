<?php
$allProducts = "SELECT * FROM `posts`";

$res1 = mysqli_query($conn, $allProducts);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);

?>




<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                From the Firehose
            </h3>
            <?php foreach ($alledaten as $datensatz) { ?>

                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $datensatz['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $datensatz['created_at'];
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
        <!-- /.blog-main -->

        <?php include('aside.php'); ?>
        <!-- /.blog-sidebar -->

    </div>
    <!-- /.row -->

</main>