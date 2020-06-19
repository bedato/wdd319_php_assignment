<?php
require_once('includes/functions/functions.inc.php');
$contents = pageQuery('about', $conn);
?>
<div class="col-md-8">
    <h1 class="mb-4"><?= $contents[0]['title'] ?></h1>
    <div class="lead"><?= $contents[0]['intro_text'] ?></div>
    <div class="my-4">
        <img src="assets/page_imgs/<?= $contents[0]['img'] ?>" class="img-thumbnail profilepic" alt="">
    </div>
    <div><?= $contents[0]['content'] ?></div>
</div>