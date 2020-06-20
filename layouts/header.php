<?php
$contents = pageQuery('header_public', $conn);
?>
<header class="masthead" id="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center px-5">
            <div class="mainText col-12 text-left">
                <h1 class="mb-3 py-5 font-weight-light text-light display-2"><?= $contents[0]['title'] ?></h1>
                <p class="lead text-light"><?= $contents[0]['intro_text'] ?></p>
                <a href="index.php?page=register"><button type="button" class="border border-white text-light btn btn-default btn-lg bg-dark my-5 px-5 py-3">Register Now</button></a>
            </div>
        </div>
    </div>
</header>