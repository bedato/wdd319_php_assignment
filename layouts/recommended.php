<?php

$recStory = "SELECT * FROM `posts` WHERE recommend=1";

$resRec = mysqli_query($conn, $recStory);

if ($resRec === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getRecStory = mysqli_fetch_all($resRec, MYSQLI_ASSOC);

?>


<div class="row my-5">
    <?php foreach ($getRecStory as $datensatz) { ?>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <span class="text-muted">Recoomendation</span>
                    <h3 class="mb-3">
                        <a class="text-dark" href="home.php?page=article&post_id=<?php echo $datensatz['id']; ?>"><?php echo $datensatz['title']; ?></a>
                    </h3>
                    <p class="card-text mb-4"><?php echo $datensatz['content']; ?></a></p>
                    <div class="mb-1 text-muted font-weight-lighter font-italic"><?php echo $datensatz['date']; ?></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>