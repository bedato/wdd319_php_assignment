<?php
require_once('includes/config.inc.php');
require_once('includes/functions/functions.inc.php');
require_once('includes/nav.inc.php'); // array  with nav data

//sql connection
$conn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME);

if ($conn === false) {
    die('Connection failed!: ' . mysqli_connect_error());
}

// Page controler
$page = 'welcome';
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
?>
<!doctype html>
<html lang="en">


<?php include('layouts/head.php'); ?>


<body class="bg-dark">
    <div class="cover-container">
        <?php include('layouts/nav.php'); ?>
        <?php if ($page == 'welcome') {
            include('layouts/header.php');
        } ?>
    </div>

    <?php include('layouts/main.php'); ?>

    <?php include('layouts/footer.php'); ?>

    <?php include('layouts/jsscripts.php'); ?>

</body>

</html>