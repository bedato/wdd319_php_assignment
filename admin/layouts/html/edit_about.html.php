<?php
include('includes/editAbout.inc.php');

$abt_sql = "SELECT * FROM pages WHERE page = ?";
$id = "about";
$stmt = mysqli_stmt_init($conn);
?>
<div class="container">
    <div class="mb-5">
        <h1 class="mb-4">Edit About</h1>
        <p class="lead">Edit the About section from the blog.</p>
    </div>
    <?php
    if (!mysqli_stmt_prepare($stmt, $abt_sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result); ?>

        <div>
            <form method='post' enctype="multipart/form-data" data-parsley-validate="" id="editAbout">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>" required="" data-parsley-required-message="Please enter your Post title"><br>
                </div>
                <div class="custom-file">
                    <input type="file" name="bild" class="custom-file-input" id="validatedCustomFile" required="" data-parsley-required-message="Please upload an image">
                    <label class="custom-file-label" for="validatedCustomFile">Upload an image...</label>
                </div>
                <div class="form-group mt-5">
                    <label for="intro_text">Introduction Text</label>
                    <textarea id='intro_text' class="form-control" name='intro_text'><?= $row['intro_text'] ?></textarea><br>
                </div>
                <div class="form-group">
                    <label for="content">Blog Post Content</label>
                    <textarea id='content' class="form-control" name='content'><?= $row['content'] ?></textarea><br>
                </div>

                <input type="submit" name="submit" class="text-light btn btn-default btn-lg bg-success" value="Submit">
            </form>
        </div>

    <?php } ?>
</div>


<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.replace('intro_text');

    CKEDITOR.replace('content');
</script>