<?php

require_once('includes/config.inc.php');
require_once('includes/loggedInStatus.inc.php');
require_once('includes/navLogged.inc.php'); // array  with nav data
//require_once('includes/functions.inc.php');

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

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body class="bg-info">
    <div class="container">
        <?php include('layouts/secLayouts/sec_nav.php'); ?>

        <?php include('layouts/header.php'); ?>
        <?php if ($page == 'posts') {
            include('layouts/recommended.php');
        } ?>
    </div>

    <?php include('layouts/main_sec.php'); ?>

    <!-- /.container -->
    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/jsscripts.php'); ?>

</body>

</html>