<?php

$topStory = "SELECT * FROM `posts` WHERE top_story=1";

$resStory = mysqli_query($conn, $topStory);

if ($resStory === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getTopStory = mysqli_fetch_all($resStory, MYSQLI_ASSOC);

?>
<?php foreach ($getTopStory as $datensatz) { ?>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"><?php echo $datensatz['title']; ?></h1>
            <p class="lead my-3"><?php echo $datensatz['content']; ?></p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

<?php } ?>