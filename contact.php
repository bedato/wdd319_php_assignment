<?php

require_once('includes/config.inc.php');

//require_once('includes/functions.inc.php');

$conn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME);

if ($conn === false) {
    die('Verbindung zur Datenbank fehlgeschlagen: ' . mysqli_connect_error());
}
?>


<!doctype html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body>
    <div class="container">
        <?php include('layouts/nav.php'); ?>
    </div>


    <!-- /.container -->
    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/jsscripts.php'); ?>

</body>

</html>