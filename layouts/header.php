<?php

$topStory = "SELECT * FROM `posts` WHERE top_story=1";

$resStory = mysqli_query($conn, $topStory);

if ($resStory === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getTopStory = mysqli_fetch_all($resStory, MYSQLI_ASSOC);

?>
<?php foreach ($getTopStory as $datensatz) { ?>

    <header class="masthead" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center px-5">
                <div class="mainText col-12 text-left">
                    <h1 class="mb-3 py-5 font-weight-light text-light display-2"><?php echo $datensatz['title']; ?></h1>
                    <p class="lead text-light"><?php echo $datensatz['content']; ?></p>
                    <a href="index.php?page=register"><button type="button" class="border border-white text-light btn btn-default btn-lg bg-dark my-5 px-5 py-3">Register Now</button></a>
                </div>
            </div>
        </div>
    </header>


<?php } ?>