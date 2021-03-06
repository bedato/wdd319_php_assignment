<?php
include('includes/pagination.inc.php')
?>
<div class="container">
    <div class="d-flex justify-content-center flex-wrap">
        <?php foreach ($alledaten as $datensatz) { ?>
            <div class="mb-5">
                <a class="text-dark" href="admin.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
                    <div class="card mx-3" style="width: 18rem;">
                        <img class="card-img-top" src="../assets/blog_imgs/<?= $datensatz['img'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $datensatz['title'] ?></h5>
                            <p class="card-text"><?= truncate($datensatz['intro_text']) ?></p>
                        </div>
                        <div class="card-body">
                            <a href="admin.php?page=article&post_id=<?php echo $datensatz['id']; ?>" class="card-link"><button class="btn btn-primary btn-lg btn-block"><i class="fas fa-pen"></i> Edit</button></a>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <div style="width: 18rem;">
            <a href="admin.php?page=new_post"><button type="button" class="btn btn-success btn-lg btn-block py-5 mb-5"><i class="fas fa-plus"></i> Add New Post</button></a>
        </div>
    </div>
</div>


<div class="d-flex container justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $disabledPrev ?>">
                <a class="page-link" href="admin.php?page=posts&pg=<?= $page_nr - 1 ?>">Previous</a>
            </li>
            <?php
            for ($page_nr = 1; $page_nr <= $number_of_pages; $page_nr++) { ?>
                <a class="page-item"><a class="page-link" href="admin.php?page=posts&pg=<?= $page_nr ?>"><?= $page_nr ?></a>
                <?php } ?>

                <li class="page-item">
                    <a class="page-link" href="admin.php?page=posts&pg=<?= $page_nr - 1 ?>">Next</a>
                </li>
        </ul>
    </nav>
</div>