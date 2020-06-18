<?php
include('includes/editAbout.inc.php');

$abt_sql = "SELECT * FROM pages WHERE page = ?";
$id = "about";
$stmt = mysqli_stmt_init($conn);
?>
<div class="mb-5 pb-5">
    <h1 class="mb-3">Edit Post</h1>
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
        <form method='post' enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="<?= $row['title'] ?>"><br>
            </div>
            <div>
                <label for="picture">Upload Picture</label>
                <input type="file" name="bild" /><br><br>
            </div>
            <div>
                <label for="intro_text">Introduction Text</label>
                <textarea id='intro_text' name='intro_text'><?= $row['intro_text'] ?></textarea><br>
            </div>
            <div>
                <label for="content">Blog Post Content</label>
                <textarea id='content' name='content'><?= $row['content'] ?></textarea><br>
            </div>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

<?php } ?>


<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.inline('intro_text');

    CKEDITOR.replace('content');
</script>