<?php
$aboutTable = "SELECT * FROM about";

$resultat = mysqli_query($conn, $aboutTable);

if ($resultat === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$allAbout = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

?>

<?php foreach ($allAbout as $data) { ?>

    <div class="col-md-8">
        <h1 class="mb-4"><?php echo $data['title']; ?></h1>
        <p><?php echo $data['content']; ?></p>
        <img src="img/<?php echo $data['img']; ?>" class="img-thumbnail" alt="">
        <h2 class="m-4"><?php echo $data['heading2']; ?></h2>
        <ul>
            <li><a href="#"><?php echo $data['links']; ?></a></li>
            <li> <a href="#"><?php echo $data['links']; ?></a></li>
            <li><a href="#"><?php echo $data['links']; ?></a></li>
        </ul>
    </div>

<?php } ?>