<?php
/*
 Change Username

 - Check Current Session username
 - Check if the input is set
 - Check if the isset name is not already in the DB
 - Check if the isset name is valid through the same filters we had in the register page
 - If everything is true: change the username to the input one.
 - Else: error messages and nothing happens.

 */

$submitNewUsername = true;
$current_username = $_SESSION['username'];
$new_username_input = isset($_POST['username_new']) ? $_POST['username_new'] : '';
$error_messages = [];
$illegal = "#$%^&*()+=-[]';,./{}|:<>?~";

if (isset($_POST['username_new'])) {

    $username_new = mysqli_real_escape_string($conn, $_POST['username_new']);

    $resultUsername = $conn->query("SELECT * FROM users WHERE username='" . $username_new . "'");

    if (empty($new_username_input)) {
        $error_messages[] = 'Please enter your new username';
        $submitNewUsername = false;
    }

    if (strpbrk($_POST['username_new'], $illegal)) {
        $error_messages[] = 'Please no Special Characters';
        $submitNewUsername = false;
    }

    if (mysqli_num_rows($resultUsername) >= 1) {
        $error_messages[] = 'username already taken';
        $submitNewUsername = false;
    }
} else {
    $submitNewUsername = false;
}

if ($submitNewUsername == true) {
    $successmsg = 'Thank you! your username changed!';
    $sql = "UPDATE `users` SET `username` = '" . $username_new . "' WHERE `users` . `username` = '" . $current_username . "'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    echo '<p style="color:red;">';
    echo '<br>' . $successmsg;
    echo '</p>';

    header('Location: home.php?page=logout');
}

if (count($error_messages) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $error_messages);
    echo '</p>';
}








$submitNewPw = true;
$new_pw_input = isset($_POST['new_pw']) ? $_POST['new_pw'] : '';
$old_pw_input = isset($_POST['old_pw']) ? $_POST['old_pw'] : '';
$error_msgs = [];

if (isset($_POST['old_pw']) && isset($_POST['new_pw'])) {

    $pw_old = mysqli_real_escape_string($conn, $_POST['old_pw']);
    $pw_new = mysqli_real_escape_string($conn, $_POST['new_pw']);

    $resultPw = $conn->query("SELECT * FROM users WHERE password='" . $pw_old . "'");

    if (empty($old_pw_input)) {
        $error_msgs[] = 'Please enter your old password';
        $submitNewPw = false;
    }

    if (empty($new_pw_input)) {
        $error_msgs[] = 'Please enter your new password';
        $submitNewPw = false;
    }

    if (!$_POST['old_pw'] == $resultPw) {
        $errormsg[] = 'old Password incorrect!';
        $readyToSend = false;
    }
} else {
    $submitNewPw = false;
}

if ($submitNewPw == true) {
    $successmsg = 'Thank you! your password changed!';
    $sql = "UPDATE `users` SET `password` = '" . $pw_new . "' WHERE `users` . `username` = '" . $current_username . "'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    echo '<p style="color:red;">';
    echo '<br>' . $successmsg;
    echo '</p>';

    header('Location: home.php?page=logout');
}

if (count($error_msgs) > 0) {
    echo '<p style="color:red;">';
    echo implode('<br>', $error_msgs);
    echo '</p>';
}
