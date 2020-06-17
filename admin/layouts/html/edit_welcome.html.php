<?php
include('includes/editWelcome.inc.php');
?>
<div class="mb-5 pb-5">
    <h1 class="mb-3">Edit Post</h1>
    <p class="lead">Edit the Welcome Screen from the blog.</p>
</div>
<div>
    <form method='post' enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="<?= $row['title'] ?>"><br>
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

<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.inline('intro_text');

    CKEDITOR.replace('content');
</script>