<?php

require_once('includes/config.inc.php');
require_once('includes/loggedInStatus.inc.php');
require_once('includes/navLogged.inc.php'); // array  with nav data
require_once('includes/functions/functions.inc.php');

$conn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME);

if ($conn === false) {
    die('Verbindung zur Datenbank fehlgeschlagen: ' . mysqli_connect_error());
}

// Page controler
$page = 'posts';
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
?>


<!doctype html>
<html lang="en">

<?php include('layouts/secLayouts/sec_head.php'); ?>

<body class="bg-dark">
    <div class="cover-container">
        <?php
        include('layouts/secLayouts/sec_nav.php');
        include('layouts/secLayouts/sec_header.php');
        ?>
    </div>

    <?php include('layouts/sec_html/main_sec.php'); ?>

    <!-- /.container -->
    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/jsscripts.php'); ?>

</body>

</html>