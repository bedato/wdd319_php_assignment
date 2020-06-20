<?php include('includes/pagination.php') ?>
<main role="main" class="container bg-white p-5 my-3">
    <div>
        <?php
        //Main is reliable on the get parameter "page":
        if (is_file('layouts/sec_html/' . $page . '.html.php')) {
            include('layouts/sec_html/' . $page . '.html.php');
        } else {
        ?>
            <div class="container">
                <h1>Page not Found</h1>
                <p>This page does not exist (yet)</p>
                <a href="home.php?page=posts&page_nr=1"><button type="button" class="border border-white text-light btn btn-default btn-lg bg-dark my-5 px-5 py-3">Take me Home</button></a>
            </div>
        <?php } ?>

    </div>

</main>