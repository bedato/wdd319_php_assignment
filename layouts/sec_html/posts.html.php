<div class="col-md-12">
    <div class="mb-5">
        <h1>Blog posts</h1>
        <p class="lead my-3 pb-3">Click on an post that interrests you!</p>
    </div>

    <?php foreach ($alledaten as $datensatz) {
        $timestamp = $datensatz['date'];
        $timestamp = date("d/m/Y", strtotime($timestamp));
    ?>
        <a class="text-dark" href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
            <div class="card mb-5 postCard">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $datensatz['title']; ?></h2>
                    <p class="card-text"><?php echo truncate($datensatz['intro_text']) ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $datensatz['author'] . ", " . $timestamp; ?></small></p>
                </div>
                <img class="card-img-bottom cardImg" src="assets/blog_imgs/<?= $datensatz['img'] ?>" alt="Card image cap">
            </div>
        </a>
    <?php } ?>
    <!-- /.blog-post -->

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $disabledPrev ?>">
                <a class="page-link text-dark" href="home.php?page=posts&pg=<?= $page_nr - 1 ?>">Previous</a>
            </li>
            <?php
            for ($page_nr = 1; $page_nr <= $number_of_pages; $page_nr++) { ?>
                <a class="page-item text-dark"><a class="page-link" href="home.php?page=posts&pg=<?= $page_nr ?>"><?= $page_nr ?></a>
                <?php } ?>

                <li class="page-item">
                    <a class="page-link text-dark" href="home.php?page=posts&pg=<?= $page_nr - 1 ?>">Next</a>
                </li>
        </ul>
    </nav>