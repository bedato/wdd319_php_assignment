<?php

//TO DO: get this working with get parameters
print_r($_GET);
$title = mysqli_real_escape_string($conn, $_GET['title']);
$date = mysqli_real_escape_string($conn, $_GET['date']);

$sql = "SELECT * FROM posts WHERE title='$title' AND date='$date'";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="blog-post">
            <a href='index.php?title=" <?php $row['title'] ?> "&date=" <?php $row['date'] ?> "'>
                <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                <p class="blog-post-meta"><?php echo $row['date'];
                                            echo $row['author']; ?></p>
                <p><?php echo $row['content']; ?></p>
            </a>
            <hr>
        </div>
<?php    }
}
?>