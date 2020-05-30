<?php
$sql = "SELECT * FROM `posts`";

$res1 = mysqli_query($conn, $sql);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);

?>




<main role="main" class="container bg-white p-5">
    <div class="row">
        <?php
        // Main Content ist abhängig von dem GET Parameter "page":
        if (is_file('layouts/sec_html/' . $page . '.html.php')) {
            include('layouts/sec_html/' . $page . '.html.php');
        } else {
            echo '<h3>Seite nicht gefunden</h3>';
            echo '<p>Diese Seite existiert (noch) nicht.</p>';
        }

        if ($page = 'logout') {
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
                    $params["secure"],
                    $params["httponly"]
                );
            }

            // destroy the session.
            session_destroy();
        }
        ?>
        <!-- /.blog-main -->
        }

        <!-- /.blog-sidebar -->

    </div>
    <?php include('aside.php'); ?>
    <!-- /.row -->

</main>