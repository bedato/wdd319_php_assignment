<?php
session_name('boardSID');
session_set_cookie_params(time() + 15 * 60, '/', 'localhost', FALSE, TRUE);
session_start();
$session_lifetime = 15;

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}

$loginstatus = isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == true;
$gleicheIP = isset($_SESSION['userip']) && $_SESSION['userip'] == $_SERVER['REMOTE_ADDR'];

$jetzt = time();
$letzteErlaubteZeit = $jetzt - $session_lifetime * 60;

$nochAktiv = isset($_SESSION['timestamp']) && $_SESSION['timestamp'] > $letzteErlaubteZeit;

if ($loginstatus == true && $gleicheIP == true && $nochAktiv == true) {
    echo 'Du bist noch berechtigt';
    $_SESSION['timestamp'] - time();
    session_regenerate_id();
} else {
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}