<?php require_once('includes/contact.inc.php'); ?>

<div class="col-md-8">
    <!-- Default form contact -->
    <form class="text-center border border-light p-5" method="POST">

        <p class="h4 mb-4">Contact us</p>

        <!-- Name -->
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name" name="name">

        <!-- Email -->
        <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

        <!-- Subject -->
        <label>Subject</label>
        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="ex. Feedback" name="subject">

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" name="text"></textarea>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit" value="formSend">Send</button>

    </form>
    <!-- Default form contact -->
</div>