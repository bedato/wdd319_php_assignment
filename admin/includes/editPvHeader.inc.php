<?php
//edit private header
//form input check if it has value
$title = isset($_POST['title']) ? $_POST['title'] : '';
$intro_text = isset($_POST['intro_text']) ? $_POST['intro_text'] : '';

//check if the form is sent and put errors in array
$formSent = true;
$errormessages = [];

//check if the form inputs have value
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
    //validation failed form won't be send
    $formSent = false;
}
if ($formSent) {
    //update sql entry
    $sql = "UPDATE `pages` SET `title` ='" . $title . "' , `intro_text` = '" . $intro_text . "' WHERE `page` = 'header_private'";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    //redirect to success page
    header('location: admin.php?page=page_update_successful');
}

//output errors
if (count($errormessages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $errormessages);
    echo '</p>';
}
