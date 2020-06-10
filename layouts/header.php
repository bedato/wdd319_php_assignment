<?php

$topStory = "SELECT * FROM `posts` WHERE top_story=1";

$resStory = mysqli_query($conn, $topStory);

if ($resStory === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$getTopStory = mysqli_fetch_all($resStory, MYSQLI_ASSOC);

?>
<?php foreach ($getTopStory as $datensatz) { ?>
    <!-- <div class="jumbotron p-3 my-3 p-md-5 text-black rounded bg-light">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"></h1>
            <p class="lead my-3"></p>
            <a class="btn btn-secondary btn-lg" href="index.php?page=register" role="button">Register to read more</a>
        </div>
    </div> -->

    <header class="masthead" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="mainText col-12 text-left">
                    <h1 class="font-weight-light text-light display-3"><?php echo $datensatz['title']; ?></h1>
                    <p class="lead text-light"><?php echo $datensatz['content']; ?></p>
                </div>
            </div>
        </div>
    </header>


<?php } ?>