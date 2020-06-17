<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

$formSent = true;
$errormessages = [];


if (isset($_POST['title']) && isset($_POST['intro_text']) && isset($_POST['content'])) {
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
} else {
    $formSent = false;
}
if ($formSent) {
    //mysqli_query($conn, "INSERT INTO posts(title, intro_text, content, author, img) VALUES('" . $title . "','" . $intro_text . "','" . $content . "','" . $author . "', '" . $finalImg . "') ");
    $sql = "UPDATE `welcome` SET `title` ='" . $title . "' , `intro_text` = '" . $intro_text . "', `content` = '" . $content . "' WHERE `id` = 1";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    //add Success prompt
    header('location: admin.php?page=posts');
}


if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}
