<?php
require_once('includes/functions/functions.inc.php');
$contents = pageQuery('welcome', $conn);
// echo '<pre>';
// print_r($contents);
// echo '</pre>';
?>
<div class="col-md-8 blog-main">
    <div>
        <h1 class="pb-3"><?= $contents[0]['title'] ?></h1>
        <div class="lead"><?= $contents[0]['intro_text'] ?></div>
        <div><?= $contents[0]['content'] ?></div>
        <hr>
    </div>
</div>