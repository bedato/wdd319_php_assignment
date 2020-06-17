<?php
// $sql = "SELECT * FROM `posts`";

// $res1 = mysqli_query($conn, $sql);

// if ($res1 === false) {
//     echo 'MYSQL Fehler ' . mysqli_info($conn);
// }

//$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>

<main role="main" class="container p-5 my-3">
    <div class="row">
        <?php
        // Main Content ist abhängig von dem GET Parameter "page":
        if (is_file('layouts/html/' . $page . '.html.php')) {
            include('layouts/html/' . $page . '.html.php');
        } else { ?>
            <div class="container">
                <h1>Page not Found</h1>
                <p>This page does not exist (yet)</p>
                <a href="admin.php?page=welcome"><button type="button" class="border border-white text-light btn btn-default btn-lg bg-dark my-5 px-5 py-3">Take me Home</button></a>
            </div>
        <?php } ?>
    </div>
</main>