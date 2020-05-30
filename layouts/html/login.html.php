<?php
session_name('boardSID');
session_set_cookie_params(time() + 15 * 60, '/', 'localhost', FALSE, TRUE); // session cookie sichern
session_start();

$username = 'terry';
$userpw = 'test1234';

// statusvariablen: 
$error = false;
$errormessages = array();

// formular abgeschickt?
$formsent = (isset($_POST['username']) && isset($_POST['userpasswort']));

if ($formsent == true) {
    $inputUsername = $_POST['username'];
    $inputUserpw = $_POST['userpasswort'];

    // ist username aus POST = username aus Variable?
    // ist pw aus POST = pw aus Variable?
    if ($inputUsername == $username && $inputUserpw == $userpw) {
        // wenn ja, dann session erstellen: login status, timestamp, IP-Adresse (REMOTE_ADDR)
        // echo '<br>login erfolgreich';
        $_SESSION['loginstatus'] = true; // login status
        $_SESSION['timestamp'] = time();
        $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];

        // danach umleiten auf app
        // echo '<br>umleiten auf app';
        header("Location: home.php");
        exit;
    } else {
        $error = true;
        $errormessages[] = 'Username oder Passwort nicht korrekt';
    }
}

// Session array monitor fürs debugging:
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
<h4>Bitte anmelden</h4>
<?php
// Fehlermeldungen ausgeben wenn vorhanden
if ($error == true && count($errormessages) > 0) {
    echo implode('<br>', $errormessages);
}
?>

?>


<div class="col-md-8 my-3" id="login">
    <div class="container">
        <div id="login-row" class="">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="POST">
                        <h3 class=" text-info my-3">Login</h3>
                        <div class="form-group">
                            <label for="input_username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input_pw" class="text-info">Password:</label><br>
                            <input type="password" name="userpasswort" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                        <div id="register-link" class="my-5">
                            <a href="#" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>