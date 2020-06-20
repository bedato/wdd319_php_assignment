<?php

$sql = "SELECT * FROM `posts`";
$results_per_page = 5;
$res1 = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($res1);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['pg'])) {
    $page_nr = 1;
} else {
    $page_nr = $_GET['pg'];
}

$disabledPrev = '';
if ($page_nr == 1) {
    $disabledPrev = 'disabled';
}


$this_page_first_result = ($page_nr - 1) * $results_per_page;

$sql = "SELECT * FROM `posts` LIMIT " . $this_page_first_result . ',' . $results_per_page;
$res1 = mysqli_query($conn, $sql);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
<div class="container">
    <div class="d-flex justify-content-around flex-wrap">
        <?php foreach ($alledaten as $datensatz) { ?>
            <div class="mb-5">
                <a class="text-dark" href="admin.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../assets/blog_imgs/<?= $datensatz['img'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $datensatz['title'] ?></h5>
                            <p class="card-text"><?= $datensatz['intro_text'] ?></p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link"><button class="btn btn-primary btn-lg btn-block"><i class="fas fa-pen"></i> Edit</button></a>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <div style="width: 18rem;">
            <a href="admin.php?page=new_post"><button type="button" class="btn btn-success btn-lg btn-block py-5"><i class="fas fa-plus"></i> Add New Post</button></a>
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