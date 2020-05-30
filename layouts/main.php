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
        if (is_file('layouts/html/' . $page . '.html.php')) {
            include('layouts/html/' . $page . '.html.php');
        } else {
            echo '<h3>Seite nicht gefunden</h3>';
            echo '<p>Diese Seite existiert (noch) nicht.</p>';
        }
        ?>
        <!-- /.blog-main -->

        <?php include('aside.php'); ?>
        <!-- /.blog-sidebar -->

    </div>
    <!-- /.row -->

</main>