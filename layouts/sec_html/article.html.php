<?php
$currentArticle = $_GET['post_id'];
//print_r($currentArticle);
$art_sql = "SELECT * FROM posts WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $art_sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "i", $currentArticle);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    //print_r($row);
?>
    <div class="col-md-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo $row['date'];
                                        echo $row['author']; ?></p>
            <p><?php echo $row['content']; ?></p>
        </div>
    </div>

    <?php
    $cmnt_sql = "SELECT * FROM comments WHERE comment_id = $currentArticle";
    $cmnt_res = mysqli_query($conn, $cmnt_sql);
    $cmnt_data = mysqli_fetch_all($cmnt_res, MYSQLI_ASSOC);

    foreach ($cmnt_data as $total_cmnt) { ?>
        <div class="comment">
            <h5><?php echo $total_cmnt['username']; ?></h5>
            <p><?php echo $total_cmnt['comment_text']; ?></p>
            <span><?php echo $total_cmnt['timestamp']; ?></span>
        </div>
    <?php } ?>

    <?php
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';;
    $errormessages = array();
    $readyToSend = true;

    if (isset($comment)) {
        sanitizer($comment);

        if (empty($comment)) {
            $errormessages[] = 'Please enter your comment';
            $readyToSend = false;
        }
    } else {
        $readyToSend = false;
    }

    if ($readyToSend == true) {
        $sql = "INSERT INTO `comments` (`id`, `username`, `comment_text`, `comment_id`, `timestamp`) VALUES (NULL, ?, ?, ?, NULL);";

        $cmnt_stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($cmnt_stmt, $sql)) {
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($cmnt_stmt, "ssi", $_SESSION['username'], $comment, $currentArticle);
            mysqli_stmt_execute($cmnt_stmt);
        }
    }

    ?>

    <div class="row">
        <div class="col-md-12 col-md-offset-2 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Write your comment here!
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <textarea class="form-control" name="comment" placeholder="write a comment..." rows="3"></textarea>
                            <br>
                            <button name="go" type="submit" class="btn btn-info pull-right">Post</button>
                            <div class="clearfix"></div>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>