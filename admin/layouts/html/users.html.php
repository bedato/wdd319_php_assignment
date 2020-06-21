<?php
include('includes/paginationUsers.inc.php')
?>
<div class="container">
    <div class="d-flex justify-content-center flex-wrap">
        <?php foreach ($alledaten as $datensatz) { ?>
            <div class="mb-5">
                <a class="text-dark" href="admin.php?page=delete_user&user_id=<?php echo $datensatz['id']; ?>">
                    <div class="card mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $datensatz['username'] ?></h5>
                            <p class="card-text"><?= truncate($datensatz['email']) ?></p>
                        </div>
                        <div class="card-body">
                            <a href="admin.php?page=delete_user&user_id=<?php echo $datensatz['id']; ?>" class="card-link"><button class="btn btn-danger btn-lg btn-block"><i class="fas fa-trash"></i> Delete</button></a>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
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