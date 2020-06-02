<?php

$topStory = "SELECT * FROM `posts` WHERE top_story=1";

$resStory = mysqli_query($conn, $topStory);

if ($resStory === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getTopStory = mysqli_fetch_all($resStory, MYSQLI_ASSOC);

?>
<?php foreach ($getTopStory as $datensatz) { ?>
    <div class="jumbotron p-3 my-3 p-md-5 text-black rounded bg-light">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"><?php echo $datensatz['title']; ?></h1>
            <p class="lead my-3"><?php echo $datensatz['content']; ?></p>
            <a class="btn btn-secondary btn-lg" href="index.php?page=register" role="button">Register to read more</a>
        </div>
    </div>

<?php } ?>