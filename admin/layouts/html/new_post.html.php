<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$author = isset($_POST['author']) ? $_POST['author'] : '';

$formSent = true;
$errormessages = [];

$maxFileSize = 5 * 1024 * 1024; // 5 MB in Bytes
$allowed_fileformat = array('image/jpeg', 'image/gif', 'image/png');
$timestamp = date("Y-m-d H:i:s");

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
} else {
    $formSent = false;
}

//add Date value to inserts (look up comments in the privates)
if ($formSent) {
    mysqli_query($conn, "INSERT INTO posts(title,intro_text,content, date, author, img) VALUES('" . $title . "','" . $intro_text . "','" . $content . "','" . $timestamp . "','" . $author . "', '" . $finalImg . "') ");
    //add Success prompt
    header('location: admin.php?page=article_create_successful');
}

if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}


?>
<div class="container">
    <div class="mb-5">
        <h1 class="mb-4">Add a new Post</h1>
        <p class="lead">Here you can add a new Post to your Blog! Simply fill out this form and you new blog post is good to go.</p>
    </div>
    <div>
        <form method='post' enctype="multipart/form-data" data-parsley-validate="" id="editArticle">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required="" data-parsley-required-message="Please enter your Post title"><br>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="author" class="form-control" required="" data-parsley-required-message="Please enter your Post title" name="author"><br>
            </div>
            <div class="custom-file">
                <input type="file" name="bild" class="custom-file-input" id="validatedCustomFile" required="" data-parsley-required-message="Please upload an image">
                <label class="custom-file-label" for="validatedCustomFile">Upload an image...</label>
            </div>
            <div class="form-group mt-5">
                <label for="intro_text">Introduction Text</label>
                <textarea id='intro_text' name='intro_text'></textarea><br>
            </div class="form-group">
            <div>
                <label for="content">Blog Post Content</label>
                <textarea id='content' name='content'></textarea><br>
            </div>
            <input type="submit" class="text-light btn btn-default btn-lg bg-success" name="submit" value="Submit">
        </form>
    </div>
</div>

<script type="text/javascript">
    // Initialize CKEditor
    CKEDITOR.replace('intro_text');

    CKEDITOR.replace('content');
</script>