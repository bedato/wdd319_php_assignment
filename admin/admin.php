<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'blog');

//Remove before releasing for security reasons
if ($conn === false) {
    die('Connection Failed: ' . mysqli_connect_error());
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


<body>
    <div class="cover-container">
        <?php include('layouts/nav.php'); ?>
    </div>

    <?php include('layouts/main.php'); ?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
</body>

</html>