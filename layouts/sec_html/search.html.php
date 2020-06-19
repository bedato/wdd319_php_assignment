<div class="col-md-12">
    <h1>Search Result: </h1>
    <div>
        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //SQL query statement
            $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR author LIKE '%$search%' OR date LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo '<div class="my-3 pb-3">';
            echo '<p class="lead">There are ' . $queryResult . ' results</p>';
            echo '</div>';

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a class="text-dark" href="home.php?page=article&post_id=<?php echo $row['id']; ?>">
                        <div class="card mb-3 postCard">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['title']; ?></h2>
                                <p class="card-text"><?php echo truncate($row['intro_text']) ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $row['author'] . ", " . $row['date']; ?></small></p>
                            </div>
                            <img class="card-img-bottom cardImg" src="assets/blog_imgs/<?= $row['img'] ?>" alt="Card image cap">
                        </div>
                    </a>
        <?php  }
            } else {
                echo '<div class="my-3 pb-3">';
                echo '<p class="lead">There are no results matching your search</p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>