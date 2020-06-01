<?php
$current_user = $_SESSION['username'];
$del_username = isset($_POST['delete_user']) ? $_POST['delete_user'] : '';
$purge = true;
$errormsgs = [];
if (isset($_POST['delete_user'])) {

    $insert_user = mysqli_real_escape_string($conn, $_POST['delete_user']);
    $actual_user = $conn->query("SELECT * FROM users WHERE username='.$current_user.'");

    if (empty($del_username)) {
        $purge = false;
        $errormsgs[] = 'Enter your Username';
    }

    if (!$insert_user == $actual_user) {
        $purge = false;
        $errormsgs[] = 'The inserted username dose not match';
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
