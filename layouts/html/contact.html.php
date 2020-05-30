<?php
//Form Validation

//Monitor
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$readyToSend = true;
$errormessages = array();

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$text = isset($_POST['text']) ? $_POST['text'] : '';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    if (empty($name)) {
        $errormessages[] = 'Please enter your name';
        $readyToSend = false;
    }

    if (empty($email)) {
        $errormessages[] = 'Please enter your Email adress';
        $readyToSend = false;
    }

    if (empty($text)) {
        $errormessages[] = 'Please enter your message';
        $readyToSend = false;
    }

    $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($validEmail == false) {
        $errormessages[] = 'Please enter a correct mail adress';
        $readyToSend = false;
    }
} else {
    $readyToSend = false;
}

//if everything was ok

if ($readyToSend == true) {
    $successMsg = 'Thank you ' . $name . ', We will process your request and get back to you by this mail: ' . $email;
}

if (count($errormessages) > 0) {
    echo implode('<br>', $errormessages);
}

if (isset($successMsg)) {
    echo '<br>' . $successMsg;
}

?>




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
        <select class="browser-default custom-select mb-4">
            <option value="" disabled>Choose option</option>
            <option value="1" selected>Feedback</option>
            <option value="2">Report a bug</option>
            <option value="3">Feature request</option>
            <option value="4">Feature request</option>
        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" name="text"></textarea>
        </div>

        <!-- Copy -->
        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
            <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit" value="formSend">Send</button>

    </form>
    <!-- Default form contact -->
</div>