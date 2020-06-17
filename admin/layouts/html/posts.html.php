<?php

$sql = "SELECT * FROM `posts`";

$res1 = mysqli_query($conn, $sql);

if ($res1 === false) {
    echo 'MYSQL Fehler ' . mysqli_info($conn);
}

$alledaten = mysqli_fetch_all($res1, MYSQLI_ASSOC);
foreach ($alledaten as $datensatz) { ?>
    <a class="text-dark" href="admin.php?page=article&post_id=<?php echo $datensatz['id']; ?>">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/blog_imgs/<?= $datensatz['img'] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $datensatz['title'] ?></h5>
                <p class="card-text"><?= $datensatz['intro_text'] ?></p>
            </div>
            <div class="card-body">
                <a href="#" class="card-link">Edit</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </a>
<?php } ?>

<div style="width: 18rem;">
    <a href="admin.php?page=new_post"><button type="button" class="btn btn-success btn-lg btn-block py-5">Add New Post +</button></a>
</div>