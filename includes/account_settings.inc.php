<?php
//Change Username. 
//Setup Variables
$submitNewUsername = true;
$current_username = $_SESSION['username'];
$new_username_input = isset($_POST['username_new']) ? $_POST['username_new'] : '';
$error_messages = [];
$illegal = "#$%^&*()+=-[]';,./{}|:<>?~";

//Check if the input field has value
if (isset($_POST['username_new'])) {

    //sqlinjection preparation
    $username_new = mysqli_real_escape_string($conn, $_POST['username_new']);
    //Look for the new username in the db (can be used to check if it already exists).
    $resultUsername = $conn->query("SELECT * FROM users WHERE username='" . $username_new . "'");

    //Validation: check if name input has: value, illegal character and if it already exists.
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
    //if validation failed the submit will not be activated, form will not be send.
    $submitNewUsername = false;
}

//if validation passed: put out success msg, update the sql entry. if the entry failed: show error (this has to be removed if the website would get online)
if ($submitNewUsername == true) {
    $successmsg = 'Thank you! your username changed!';
    $sql = "UPDATE `users` SET `username` = '" . $username_new . "' WHERE `users` . `username` = '" . $current_username . "'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    //debug log
    // echo '<p style="color:red;">';
    // echo '<br>' . $successmsg;
    // echo '</p>';

    //redirect to logout. on next login the credentials will be updated
    header('Location: home.php?page=logout');
}

//show error messages if there are any
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

    $resultPw = "SELECT password FROM users WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $resultPw)) {
        echo 'SQL statement failed';
    } else {
        mysqli_stmt_bind_param($stmt, "s", $current_username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        $decrypt = password_verify($password, $hash);

        if (empty($old_pw_input)) {
            $error_msgs[] = 'Please enter your old password';
            $submitNewPw = false;
        }

        if (empty($new_pw_input)) {
            $error_msgs[] = 'Please enter your new password';
            $submitNewPw = false;
        }

        if (!$_POST['old_pw'] == $decrypt) {
            $errormsg[] = 'old Password incorrect!';
            $readyToSend = false;
        }
    }
} else {
    $submitNewPw = false;
}

if ($submitNewPw == true) {
    $successmsg = 'Thank you! your password changed!';
    $npw = password_hash($pw_new, PASSWORD_DEFAULT);
    $sql = "UPDATE `users` SET `password` = '" . $npw . "' WHERE `users` . `username` = '" . $current_username . "'";
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
