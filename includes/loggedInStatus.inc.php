<?php
session_name('boardSID');
session_set_cookie_params(time() + 60 * 60, '/', 'localhost', FALSE, TRUE);
session_start();
$session_lifetime = 60;
//Setup session and session params first.

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


//check login status and ip. should be the same as in session
$loginstatus = isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == true;
$gleicheIP = isset($_SESSION['userip']) && $_SESSION['userip'] == $_SERVER['REMOTE_ADDR'];

//allowed session cookie time
$jetzt = time();
$letzteErlaubteZeit = $jetzt - $session_lifetime * 60;

//check if user is active
$nochAktiv = isset($_SESSION['timestamp']) && $_SESSION['timestamp'] > $letzteErlaubteZeit;

//if the status, ip and activity is true, the session will be refreshed. else the session gets destroyed and the user will be redirected.
if ($loginstatus == true && $gleicheIP == true && $nochAktiv == true) {
    //echo 'Du bist noch berechtigt';
    $_SESSION['timestamp'] - time();
    session_regenerate_id();
} else {
    session_destroy();
    header("Location: index.php");
    exit;
}
