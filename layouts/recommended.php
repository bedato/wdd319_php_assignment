<?php

$recStory = "SELECT * FROM `posts` WHERE recommend=1";

$resRec = mysqli_query($conn, $recStory);

if ($resRec === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getRecStory = mysqli_fetch_all($resRec, MYSQLI_ASSOC);

?>


<div class="row mb-2">
    <?php foreach ($getRecStory as $datensatz) { ?>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark" href="#"><?php echo $datensatz['title']; ?></a>
                    </h3>
                    <div class="mb-1 text-muted"><?php echo $datensatz['date']; ?></div>
                    <p class="card-text mb-auto"><?php echo $datensatz['content']; ?></a>
                </div>
                <!-- <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap"> -->
            </div>
        </div>
    <?php } ?>
</div>