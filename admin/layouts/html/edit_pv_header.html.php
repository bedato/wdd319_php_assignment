<?php
include('includes/editPvHeader.inc.php');

//get the about page with prepared statement
$wlc_sql = "SELECT * FROM pages WHERE page = ?";
$id = "header_private";
$stmt = mysqli_stmt_init($conn);
?>
<div class="container">
    <div class="mb-5">
        <h1 class="mb-4">Edit Private Header</h1>
        <p class="lead">Edit the Private Header from the blog.</p>
    </div>
    <?php
    if (!mysqli_stmt_prepare($stmt, $wlc_sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);

        //get result and paste it into the DOM
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result); ?>

        <div>
            <form method='post' enctype="multipart/form-data" data-parsley-validate="" id="editPvWelcome">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>" required="" data-parsley-required-message="Please enter your Post title"><br>
                </div>
                <div class="form-group">
                    <label for="intro_text">Introduction Text</label>
                    <textarea id='intro_text' class="form-control" name='intro_text'><?= $row['intro_text'] ?></textarea><br>
                </div>
                <input type="submit" name="submit" value="Submit" class="text-light btn btn-default btn-lg bg-success">
            </form>
        </div>

    <?php } ?>
</div>