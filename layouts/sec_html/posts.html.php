<div class="col-md-8 blog-main">
    <?php foreach ($alledaten as $datensatz) { ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $datensatz['title']; ?></h2>
            <p class="blog-post-meta"><?php echo $datensatz['date'];
                                        echo $datensatz['author']; ?></p>
            <p><?php echo $datensatz['content']; ?></p>
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
                        <span style="display: none;"><?php echo $datensatz['id']; ?></span>
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

    <?php } ?>
    <!-- /.blog-post -->

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>