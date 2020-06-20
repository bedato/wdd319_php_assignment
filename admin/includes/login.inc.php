<?php
session_name('adminSID');
session_set_cookie_params(time() + 15 * 60, '/', 'localhost', FALSE, TRUE); // session cookie sichern
session_start();
//Session start with params

//sql connection
$conn = mysqli_connect('localhost', 'root', 'root', 'blog');

//Remove before releasing for security reasons
if ($conn === false) {
    die('Connection Failed: ' . mysqli_connect_error());
}

//error vars
$error = false;
$errormessages = array();

//did the form get sent?

if (isset($_POST['username']) && isset($_POST['userpassword']) && isset($_POST['submit'])) {
    $_SESSION['counter']++;
    if ($_SESSION['counter'] > 2) {
        //after 3 attempts user gets redirected to home page
        header('Location: index.php');
    }

    //Security mesurment: prepared statements 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['userpassword']);
    $pwDb = "SELECT password FROM admin WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $pwDb)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        //check pw hash from database, if it matches -> login continues
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        $decrypt = password_verify($password, $hash);

        //does the pw match the username in the db after getting decrypted? if yes -> user login
        if ($decrypt) {
            //create session -> values in the session array
            // echo '<br>login erfolgreich';
            $_SESSION['loginstatus'] = true; // login status
            $_SESSION['timestamp'] = time();
            $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['username'] = $username;

            //redirect to safe space
            header("Location: admin.php");
            exit;
        } else {
            //validation failed: error output
            $error = true;
            $errormessages[] = 'Username oder Passwort nicht korrekt';
        }
    }
} else {
    //reset counter for the login attempts
    $_SESSION['counter'] = 0;
}

//Session array monitor fürs debugging:
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Fehlermeldungen ausgeben wenn vorhanden
if ($error == true && count($errormessages) > 0) {
    echo implode('<br>', $errormessages);
}
