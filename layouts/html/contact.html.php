<?php require_once('includes/contact.inc.php'); ?>

<div class="col-md-8">
    <form class="text-left border border-light mb-5" data-parsley-validate="" id="contactForm" method="POST">
        <h1 class="mb-4">Contact Us!</h1>
        <?php
        if (isset($successMsg)) {
            echo '<div class="alert alert-success" role="alert">';
            echo $successMsg;
            echo '</div>';
        }
        ?>
        <p class="mb-5">We will get back at you As soon as Possible! <br> Please fill out the Form:</p>

        <label for="input_username" class="text-dark">Name</label><br>
        <input type="text" id="cntName" class="form-control mb-4" required="" data-parsley-required-message="Please enter your name" placeholder="Name" name="name" value="<?= $name ?>">

        <label for="input_email" class="text-dark">Email:</label><br>
        <input type="email" id="cntEmail" class="form-control mb-4" required="" placeholder="E-mail" name="email" data-parsley-required-message="Please enter a valid mail adress" data-parsley-trigger="change" value="<?= $email ?>">

        <label>Subject</label>
        <input type="text" id="cntSubject" class="form-control mb-4" required="" data-parsley-required-message="Please enter a subject" placeholder="ex. Feedback" name="subject" value="<?= $subject ?>">

        <div class="form-group">
            <label for="input_message" class="text-dark">Message:</label><br>
            <textarea class="form-control rounded-0" id="cntText" rows="3" placeholder="Message" name="text" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-minlength-message="You need to enter at least a 20 character message" data-parsley-validation-threshold="10"><?= $text ?></textarea>
        </div>

        <button class="btn btn-dark btn-block" id="sendContactForm" type="submit" value="formSend">Send</button>

    </form>
</div>