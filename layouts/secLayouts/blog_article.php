    <div class=" article">
        <div class="blog-post">
            <h1 class="blog-post-title"><?php echo $row['title']; ?></h1>
            <p class="font-italic"><?php echo $row['author']; ?></p>
            <p class="lead"><?php echo $row['intro_text']; ?></p>
            <img class="img-fluid" src="assets/blog_imgs/<?php echo $row['img']; ?>" alt="">
            <p class="mb-5"><?php echo $row['content']; ?></p>
            <span class="font-italic text-muted"><?php echo $row['date']; ?></span>
        </div>
    </div>
    <hr>