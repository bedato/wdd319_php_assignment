   <?php
    /*
1. Form Inhalte checken

Username: 
- Keine Sonderzeichen
- Soll nicht schon in der Datenbank registriert sein

Email: 
- Regex
- Soll nicht schon in der Datenbank registriert sein

Passwort: 
- mind. 8 zeichen lang

Passwort Confirm: 
- gleich wie Passwort.

2. Errors catchen + error message

3. Wenn alle daten korrekt sind: in die Datenbank neue Table erstellen, und successmessage erstellen. 
+ Email soll versendet werden.
*/
    $readyToSend = true;
    $errormsg = [];
    $illegal = "#$%^&*()+=-[]';,./{}|:<>?~";

    $inputUsername = isset($_POST['username']) ? $_POST['username'] : '';
    $inputEmail = isset($_POST['email']) ? $_POST['email'] : '';
    $inputPassword = isset($_POST['password']) ? $_POST['password'] : '';
    $inputPasswordConfirm = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';


    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])  && isset($_POST['confirm_password'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $resultUsername = $conn->query("SELECT * FROM users WHERE username='" . $username . "'");
        $resultEmail = $conn->query("SELECT * FROM users WHERE email='" . $email . "'");

        //Username Validation
        if (empty($inputUsername)) {
            $errormsg[] = 'Please enter a Name';
            $readyToSend = false;
        }

        if (strpbrk($_POST['username'], $illegal)) {
            $errormsg[] = 'Special Characters are not allowed';
            $readyToSend = false;
        }

        if (mysqli_num_rows($resultUsername) >= 1) {
            $errormsg[] = 'Username already Taken';
            $readyToSend = false;
        }

        //Email Validation
        if (empty($inputEmail)) {
            $errormsg[] = 'Please Enter an Email adress';
            $readyToSend = false;
        }

        $validEmail = filter_var($inputEmail, FILTER_VALIDATE_EMAIL);

        if ($validEmail == false) {
            $errormsg[] = 'Please Enter a Correct mail adress';
            $readyToSend = false;
        }

        if (mysqli_num_rows($resultEmail) >= 1) {
            $errormsg[] = 'Email already Taken';
            $readyToSend = false;
        }

        //Password Validation
        if (empty($inputPassword)) {
            $errormsg[] = 'please enter Password';
            $readyToSend = false;
        }

        if (strlen($_POST['password']) < 8) {
            $errormsg[] = 'Your Password need atleast 8 characters';
            $readyToSend = false;
        }

        if (empty($_POST['confirm_password'])) {
            $errormsg[] = 'Please confirm your Password';
            $readyToSend = false;
        }

        if (!$_POST['confirm_password'] == $_POST['password']) {
            $errormsg[] = 'confirm must match password!';
            $readyToSend = false;
        }
    } else {
        $readyToSend = false;
    }

    if ($readyToSend == true) {
        // Success (speichern/versenden/dankesmeldung)
        $successmessage = 'Thank you very much for your Registration! you will get a confirmation mail with your credentials';
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, '" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "');";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }

        $message = 'Thank you for Your Registration! your Email: ' . $_POST['email'] . ' Your Username: ' . $_POST['email'] . '<br> Thank you for your Registration';
        //Send mail to Email
        //TO DO: Make it Spamproof

        $mailto = $_POST['email'];
        $betreff = 'Registration for my Personal Blog!';
        $message = '<html>' . nl2br($message) . '</html>'; // Umwandlung Neue Zeilen, wenn HTML
        $headers = "From: kyomiru@gmail.com \n";
        $headers .= "Reply-To: <kyomiru@gmail.com>\n";
        $headers .=  "Content-Type: text/html; charset='ISO-8859-1'";


        echo '<pre>';
        echo $headers;
        echo '</pre>';
    }

    // Fehlermeldungen ausgeben: 
    if (count($errormsg) > 0) {
        echo '<p style="color:red;">';
        echo implode('<br>', $errormsg);
        echo '</p>';
    }