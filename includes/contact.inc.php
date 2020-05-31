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
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    if (empty($name)) {
        $errormessages[] = 'Please enter your name';
        $readyToSend = false;
    }

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

if ($readyToSend === true && count($errormessages) > 0) {
    $empfaenger = 't.m.rvle@gmail.com';
    $betreff = 'Kontaktanfrage von training.bytekultur.net';
    $text = '<html>' . nl2br($text) . '</html>';
    $headers = "From: mailer@bytekultur.net \n";
    $headers .= "Reply-To: <" . $email . ">\n";
    $headers .=  "Content-Type: text/html; charset='ISO-8859-1'";


    echo '<pre>';
    echo $headers;
    echo '</pre>';

    // $mailsent = mail($empfaenger, $betreff, $nachricht, $headers);
}
