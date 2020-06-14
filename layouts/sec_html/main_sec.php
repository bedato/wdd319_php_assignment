<?php include('includes/pagination.php') ?>
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