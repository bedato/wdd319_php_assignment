<?php
$current_user = $_SESSION['username'];
$del_username = isset($_POST['delete_user']) ? $_POST['delete_user'] : '';
$purge = true;
$errormsgs = [];
if (isset($_POST['delete_user'])) {

    $insert_user = mysqli_real_escape_string($conn, $_POST['delete_user']);
    $actual_user = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $actual_user)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $current_user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    if (empty($del_username)) {
        $purge = false;
        $errormsgs[] = 'Enter your Username';
    }

    if (!$insert_user == $actual_user) {
        $purge = false;
        $errormsgs[] = 'The inserted username does not match';
    }
} else {
    $purge = false;
}

if ($purge == true) {
    $sql = "DELETE FROM `users` WHERE `users`.`username` = '" . $current_user . "'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    header('Location: home.php?page=logout');
}
