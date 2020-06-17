<?php
include('includes/editArticle.inc.php');
include('includes/deleteComment.inc.php');
?>
<div class="mb-5 pb-5">
    <h1 class="mb-3">Edit Post</h1>
    <h2>Editing Post Nr : <?= $currentArticle ?></h2>
    <p class="lead">Here you can add a new Post to your Blog! Simply fill out this form and you new blog post is good to go.</p>
</div>
<div>
    <form method='post' enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="<?= $row['title'] ?>"><br>
        </div>
        <div>
            <label for="author">Author</label>
            <input type="author" name="author" value="<?= $row['author'] ?>"><br>
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

<div>
    <p>Delete your article here, IT CAN'T BE UNDONE</p>
    <a href="admin.php?page=delete_article&post_id=<?= $row['id'] ?>">DELETE ARTICLE</a>
</div>



<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.inline('intro_text');

    CKEDITOR.replace('content');
</script>