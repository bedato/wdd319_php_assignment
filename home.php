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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Web Blog!</title>
    </head>


<body class="bg-info">
    <div class="container">
        <?php include('layouts/secLayouts/sec_nav.php'); ?>

        <?php include('layouts/header.php'); ?>
        <?php if ($page == 'posts') {
            include('layouts/recommended.php');
        } ?>
    </div>

    <?php include('layouts/sec_html/main_sec.php'); ?>

    <!-- /.container -->
    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/jsscripts.php'); ?>

</body>

</html>