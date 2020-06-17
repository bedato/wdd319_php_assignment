<div class="col-md-12">
    <h1>Search Page</h1>
    <div>
        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //SQL query statement
            $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR author LIKE '%$search%' OR date LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are " . $queryResult . " results";

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a class="text-dark" href="home.php?page=article&post_id=<?php echo $row['id']; ?>">
                        <div class="card postCard p-5  my-3 rounded">
                            <h1 class="card-title"><?php echo $row['title']; ?></h1>
                            <p class="card-text"><?php echo $row['author']; ?></p>
                            <p><?php echo truncate($row['content']); ?></p>
                            <span class="text-italic text-muted"><?php echo $row['date']; ?></span>
                        </div>
                    </a>
        <?php  }
            } else {
                echo "There are no results matching your search";
            }
        }
        ?>
    </div>
</div>