<?php
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';

$formSent = true;
$errormessages = [];


if (isset($_POST['title']) && isset($_POST['intro_text'])) {
    if (empty($title)) {
        $errormessages[] = 'Please add title';
        $formSent = false;
    }

    if (empty($intro_text)) {
        $errormessages[] = 'Please add a intro text';
        $formSent = false;
    }
} else {
    $formSent = false;
}
if ($formSent) {
    $sql = "UPDATE `pages` SET `title` ='" . $title . "' , `intro_text` = '" . $intro_text . "' WHERE `page` = 'header_private'";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    //add Success prompt
    header('location: admin.php?page=edit_pv_header');
}


if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}
