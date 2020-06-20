<?php
//Form Validation

//Monitor
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

//vars to check if the form is ready to send, and array to catch all error messages in the validation.
$readyToSend = true;
$errormessages = array();

//variables for the inputs, if set they get the set value, else they are empty (if they are not defined there will be errors)
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$text = isset($_POST['text']) ? $_POST['text'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
//Security mesurment: Sanitize inputs from html strip tags
sanitizer($name);
sanitizer($email);
sanitizer($text);
sanitizer($subject);

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    //validate form inputs, check if they are not empty
    if (empty($name)) {
        $errormessages[] = 'Please enter your name';
        $readyToSend = false;
    }

    //validate the email to check if it has the correct value and format
    $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($validEmail == false) {
        $errormessages[] = 'Please enter a correct mail adress';
        $readyToSend = false;
    }

    if (empty($subject)) {
        $errormessages[] = 'Please enter your Subject';
        $readyToSend = false;
    }


    if (empty($text)) {
        $errormessages[] = 'Please enter your message';
        $readyToSend = false;
    }
} else {
    //if validation failed, form will not be sent
    $readyToSend = false;
}

//if everything was ok
if ($readyToSend == true) {
    $successMsg = 'Thank you ' . $name . ', We will process your request and get back to you by this mail: ' . $email;
}

//in case errors appeared
if (count($errormessages) > 0) {
    echo implode('<br>', $errormessages);
}

//if the form is ready to send and there are no errors: send a mail
if ($readyToSend === true && count($errormessages) > 0) {
    $empfaenger = $email;
    $betreff = 'Kontaktanfrage von training.bytekultur.net';
    $text = '<html>' . nl2br($text) . '</html>';
    $headers = "From: kyomiru@gmail.com \n";
    $headers .= "Reply-To: <" . $email . ">\n";
    $headers .=  "Content-Type: text/html; charset='ISO-8859-1'";

    mb_send_mail($empfaenger, $betreff, $text, $headers);

    // echo '<pre>';
    // echo $headers;
    // echo '</pre>';

    mail($empfaenger, $betreff, $nachricht, $headers);
}
