
<?php
// Unset all of the session variables.
$_SESSION = array();

// kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"]
    );
}

// destroy the session.
session_destroy();
// redirect to home page
header("Location: index.php");

?>