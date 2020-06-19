    <?php
    require_once('includes/functions/functions.inc.php');
    $contents = pageQuery('header_private', $conn);
    ?>
    <header class="masthead_sec" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center px-5">
                <div class="mainText col-12 text-left">
                    <h1 class="mb-3 py-5 font-weight-light text-light display-2"><?= $contents[0]['title'] ?></h1>
                    <p class="lead text-light"><?= $contents[0]['intro_text'] ?></p>
                </div>
            </div>
        </div>
    </header>