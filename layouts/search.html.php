<div class="col-md-8">
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
                    <a href='index.php?page=article?title=" <?php $row['title'] ?> "&date=" <?php $row['date'] ?> "'>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                            <p class="blog-post-meta"><?php echo $row['date'];
                                                        echo $row['author']; ?></p>
                            <p><?php echo $row['content']; ?></p>
                            <hr>
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