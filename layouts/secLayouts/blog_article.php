    <?php
    $timestamp = $row['date'];
    $timestamp = date("d/m/Y", strtotime($timestamp));
    ?>

    <div class="article">
        <div class="blog-post">
            <h1 class="blog-post-title"><?php echo $row['title']; ?></h1>
            <div class="font-italic"><?php echo $row['author']; ?></div>
            <div class="lead"><?php echo $row['intro_text']; ?></div>
            <img class="post-img" src="assets/blog_imgs/<?php echo $row['img']; ?>" alt="">
            <div class="mb-5"><?php echo $row['content']; ?></div>
            <span class="font-italic text-muted"><?php echo $timestamp; ?></span>
        </div>
    </div>
    <hr>