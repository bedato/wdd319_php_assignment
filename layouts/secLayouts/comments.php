    <div>
        <h4>Comments: </h4>
        <?php foreach ($cmnt_data as $total_cmnt) { ?>
            <div class="mb-5 pt-2 pb-4 ">
                <h5><?php echo $total_cmnt['username'] . " "; ?> <span class="font-italic text-muted"><?php echo $total_cmnt['timestamp']; ?></span></h5>
                <p class="my-3"><?php echo $total_cmnt['comment_text']; ?></p>
            </div>
            <hr>
        <?php } ?>
    </div>