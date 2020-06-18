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
                <img class="card-img-top" src="assets/blog_imgs/<?= $datensatz['img'] ?>" alt="Card image cap">
            </div>
        </a>
    <?php } ?>
    <!-- /.blog-post -->

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $disabledPrev ?>">
                <a class="page-link" href="home.php?page=posts&pg=<?= $page_nr - 1 ?>">Previous</a>
            </li>
            <?php
            for ($page_nr = 1; $page_nr <= $number_of_pages; $page_nr++) { ?>
                <a class="page-item"><a class="page-link" href="home.php?page=posts&pg=<?= $page_nr ?>"><?= $page_nr ?></a>
                <?php } ?>

                <li class="page-item">
                    <a class="page-link" href="home.php?page=posts&pg=<?= $page_nr - 1 ?>">Next</a>
                </li>
        </ul>
    </nav>