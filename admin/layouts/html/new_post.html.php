<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$author = isset($_POST['author']) ? $_POST['author'] : '';

$formSent = true;
$errormessages = [];

$maxFileSize = 5 * 1024 * 1024; // 5 MB in Bytes
$allowed_fileformat = array('image/jpeg', 'image/gif', 'image/png');

if (isset($_POST['title']) && isset($_POST['intro_text']) && isset($_POST['content']) && isset($_POST['author']) && isset($_FILES['bild'])) {
    if (empty($title)) {
        $errormessages[] = 'Please add title';
        $formSent = false;
    }

    if (empty($intro_text)) {
        $errormessages[] = 'Please add a intro text';
        $formSent = false;
    }

    if (empty($content)) {
        $errormessages[] = 'enter your Blog content';
        $formSent = false;
    }

    if (empty($intro_text)) {
        $errormessages[] = 'Please enter the author';
        $formSent = false;
    }

    if ($_FILES['bild']['error'] > 0) {
        $errormessages[] = 'Please upload a picture';
        $formSent = false;
    } else {
        //check img
        $mimeType = mime_content_type($_FILES['bild']['tmp_name']);
        $typeOK = in_array($mimeType, $allowed_fileformat);

        $tmppfad = $_FILES['bild']['tmp_name'];
        // Zielname mit Dateinamen sollte nicht ungewollt überschrieben werden, hier mit timestamp:
        $finalImg = time() . '_' . $_FILES['bild']['name'];
        $ziel = $_SERVER['DOCUMENT_ROOT'] . '/WDDPHP/assets/blog_imgs/' . $finalImg;

        if ($typeOK) {
            // verschieben der Datei aus dem PHP Temp-Ordner zu unserem Zielordner (mit von uns gewähltem Namen )
            $uploadSuccess = move_uploaded_file($tmppfad, $ziel);
        }
    }

    if ($formSent) {
        mysqli_query($conn, "INSERT INTO posts(title,intro_text,content, author, img) VALUES('" . $title . "','" . $intro_text . "','" . $content . "','" . $author . "', '" . $finalImg . "') ");
        //add Success prompt
        header('location: admin.php?page=new_post');
    }
} else {
    $formSent = false;
}

if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}


?>
<div class="mb-5 pb-5">
    <h1 class="mb-3">Add a new Post</h1>
    <p class="lead">Here you can add a new Post to your Blog! Simply fill out this form and you new blog post is good to go.</p>
</div>
<div>
    <form method='post' enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title"><br>
        </div>
        <div>
            <label for="author">Author</label>
            <input type="author" name="author"><br>
        </div>
        <div>
            <label for="picture">Upload Picture</label>
            <input type="file" name="bild" /><br><br>
        </div>
        <div>
            <label for="intro_text">Introduction Text</label>
            <textarea id='intro_text' name='intro_text'></textarea><br>
        </div>
        <div>
            <label for="content">Blog Post Content</label>
            <textarea id='content' name='content'></textarea><br>
        </div>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.inline('intro_text');

    CKEDITOR.replace('content');
</script>