    <div>
        <h4>Comments: </h4>
        <?php foreach ($cmnt_data as $total_cmnt) {
            $timestamp = $total_cmnt['timestamp'];
            $timestamp = date("d/m/Y", strtotime($timestamp));
        ?>
            <div class="card">
                <h5 class="card-header"><?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><small><?php echo $timestamp ?></small></span></h5>
                <div class="card-body">
                    <p class="card-text"><?php echo $total_cmnt['comment_text']; ?></p>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>