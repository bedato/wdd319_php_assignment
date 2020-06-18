<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

$formSent = true;
$errormessages = [];

$maxFileSize = 5 * 1024 * 1024; // 5 MB in Bytes
$allowed_fileformat = array('image/jpeg', 'image/gif', 'image/png');

if (isset($_POST['title']) && isset($_POST['intro_text']) && isset($_POST['content']) && isset($_FILES['bild'])) {
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
        $ziel = $_SERVER['DOCUMENT_ROOT'] . '/WDDPHP/assets/page_imgs/' . $finalImg;

        if ($typeOK) {
            // verschieben der Datei aus dem PHP Temp-Ordner zu unserem Zielordner (mit von uns gewähltem Namen )
            $uploadSuccess = move_uploaded_file($tmppfad, $ziel);
        }
    }
} else {
    $formSent = false;
}
if ($formSent) {
    $sql = "UPDATE `pages` SET `title` ='" . $title . "' , `intro_text` = '" . $intro_text . "', `content` = '" . $content . "' , `img` = '" . $finalImg . "' WHERE `page` = 'about'";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    //add Success prompt
    header('location: admin.php?page=edit_about');
}


if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}
