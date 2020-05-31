<?php
session_name('boardSID');
session_set_cookie_params(time() + 15 * 60, '/', 'localhost', FALSE, TRUE); // session cookie sichern
session_start();

// statusvariablen: 
$error = false;
$errormessages = array();

// formular abgeschickt?

if (isset($_POST['username']) && isset($_POST['userpasswort'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['userpasswort']);

    $resultLog = $conn->query("SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'");

    // ist username aus POST = username aus Variable?
    // ist pw aus POST = pw aus Variable?
    if (mysqli_num_rows($resultLog)) {
        // wenn ja, dann session erstellen: login status, timestamp, IP-Adresse (REMOTE_ADDR)
        // echo '<br>login erfolgreich';
        $_SESSION['loginstatus'] = true; // login status
        $_SESSION['timestamp'] = time();
        $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['username'] = $username;

        // danach umleiten auf app
        // echo '<br>umleiten auf app';
        header("Location: home.php");
        exit;
    } else {
        $error = true;
        $errormessages[] = 'Username oder Passwort nicht korrekt';
    }
}

// Session array monitor fürs debugging:
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Fehlermeldungen ausgeben wenn vorhanden
if ($error == true && count($errormessages) > 0) {
    echo implode('<br>', $errormessages);
}
