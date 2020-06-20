<?php
include('includes/editArticle.inc.php');
include('includes/deleteComment.inc.php');
?>
<div class="container">
    <div class="mb-5">
        <h1 class="mb-4">Edit Post Nr : <?= $currentArticle ?></h1>
        <p class="lead">Here you can add a new Post to your Blog! Simply fill out this form and you new blog post is good to go.</p>
    </div>
    <div>
        <form method='post' class="form">
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" class="form-control" value="<?= $row['title'] ?>"><br>
            </div>
            <div>
                <label for="author">Author: </label>
                <input type="author" name="author" class="form-control" value="<?= $row['author'] ?>"><br>
            </div>
            <!-- <div class="form-group">
                <label for="picture" class="btn btn-default">Upload Picture</label>
                <input type="file" name="bild" /><br><br> </div>-->
            <div class="form-group my-3">
                <label for="author">Upload Picture: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Picture</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="bild" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label form-control" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-5">
                <label for="intro_text">Introduction Text: </label>
                <textarea id='intro_text' class="form-control" name='intro_text'><?= $row['intro_text'] ?></textarea><br>
            </div>
            <div class="form-group">
                <label for="content">Blog Post Content: </label>
                <textarea id='content' class="form-control" name='content'><?= $row['content'] ?></textarea><br>
            </div>
            <div class="mb-4">
                <input type="submit" name="submit" class="" value="Update Blog">
            </div>
        </form>
    </div>
    <hr>
    <div class="alert alert-danger my-5" role="alert">
        <p>Delete your article here, IT CAN'T BE UNDONE</p>
        <a href="admin.php?page=delete_article&post_id=<?= $row['id'] ?>">DELETE ARTICLE</a>
    </div>
    <hr>
</div>
<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.replace('intro_text');

    CKEDITOR.replace('content');
</script>