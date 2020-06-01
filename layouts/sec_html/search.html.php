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
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                        <p class="blog-post-meta"><?php echo $row['date'];
                                                    echo $row['author']; ?></p>
                        <p><?php echo $row['content']; ?></p>
                    </div>
                    <div class="comment">
                        <h5>John Wick</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa sequi totam magnam aspernatur consectetur! Quibusdam illo perspiciatis quo? Eius, rem?</p>
                        <span>20. January</span>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-md-offset-2 col-sm-12">
                            <div class="comment-wrapper">
                                <div class="panel panel-info">
                                    <span style="display: none;"><?php echo $row['id']; ?></span>
                                    <div class="panel-heading">
                                        Write your comment here!
                                    </div>
                                    <div class="panel-body">
                                        <form action="POST">
                                            <textarea class="form-control" name="comment" placeholder="write a comment..." rows="3"></textarea>
                                            <br>
                                            <button type="button" class="btn btn-info pull-right">Post</button>
                                            <div class="clearfix"></div>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php  }
            } else {
                echo "There are no results matching your search";
            }
        }
        ?>
    </div>

</div>