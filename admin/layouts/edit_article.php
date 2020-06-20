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
        <form method="post" enctype="multipart/form-data" data-parsley-validate="" id="editArticle">
            <div class="form-group">
                <label for="titleEdit">Title: </label>
                <input id="titleEdit" type="text" name="title" class="form-control" value="<?= $row['title'] ?>" required="" data-parsley-required-message="Please enter your Post title"><br>
            </div>
            <div class="form-group">
                <label for="author">Author: </label>
                <input type="author" name="author" class="form-control" value="<?= $row['author'] ?>" required="" data-parsley-required-message="Please enter the authors name"><br>
            </div>
            <div class="custom-file">
                <input type="file" name="bild" class="custom-file-input" id="validatedCustomFile" required="" data-parsley-required-message="Please upload an image">
                <label class="custom-file-label" for="validatedCustomFile">Upload an image...</label>
            </div>
            <div class="form-group mt-5">
                <label for="intro_text">Introduction Text: </label> <br>
                <textarea id='intro_text' class="form-control" name='intro_text'><?= $row['intro_text'] ?></textarea><br>
            </div>
            <div class="form-group">
                <label for="content">Blog Post Content: </label>
                <textarea id='content' class="form-control" name='content'><?= $row['content'] ?></textarea><br>
            </div>
            <input type="submit" name="submit" class="text-light btn btn-default btn-lg bg-success" value="Update Blog">
        </form>
    </div>
    <hr>
    <div class="alert alert-danger my-5" role="alert">
        <p>Delete your article here, IT CAN'T BE UNDONE</p>
        <a href="admin.php?page=delete_article&post_id=<?= $row['id'] ?>"><button class="text-light btn btn-default btn-lg bg-danger">Delete Article</button></a>
    </div>
    <hr>
</div>
<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.replace('intro_text');

    CKEDITOR.replace('content');
</script>