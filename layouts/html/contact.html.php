<?php require_once('includes/contact.inc.php'); ?>

<div class="col-md-8">
    <form class="text-left border border-light mb-5" method="POST">
        <h1 class="mb-4">Contact Us!</h1>
        <?php
        if (count($errormessages) > 0) {
            echo implode('<br>', $errormessages);
            //TODO: Make a JavaScript Solution
        }
        ?>
        <p class="mb-5">We will get back at you As soon as Possible! <br> Please fill out the Form</p>
        <label for="input_username" class="text-dark">Name</label><br>
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name" name="name" value="<?= $name ?>">
        <label for="input_email" class="text-dark">Email:</label><br>
        <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?= $email ?>">
        <label>Subject</label>
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="ex. Feedback" name="subject" value="<?= $subject ?>">
        <div class="form-group">
            <label for="input_message" class="text-dark">Message:</label><br>
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" name="text"></textarea>
        </div>
        <button class="btn btn-dark btn-block" type="submit" value="formSend">Send</button>

    </form>
</div>