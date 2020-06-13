<?php
$sql = "SELECT * FROM `posts`";

$res1 = mysqli_query($conn, $sql);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);

?>




<main role="main" class="container bg-white p-5 my-3">
    <div>
        <?php
        // Main Content ist abhängig von dem GET Parameter "page":
        if (is_file('layouts/sec_html/' . $page . '.html.php')) {
            include('layouts/sec_html/' . $page . '.html.php');
        } else {
            echo '<h3>Seite nicht gefunden</h3>';
            echo '<p>Page not Found.</p>';
        }
        ?>

    </div>

</main>