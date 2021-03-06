<?php
require_once("SweetHomeAutoloader.php");

session_start();
$count = 0;
$message = array();

if (isset($_POST['email'])) {
    if (strlen($_POST['email']) > 7 &&
            is_string(($_POST['email'] = InputFilter::filter($_POST['email'])))) {
        $count++;
    }
    else $message['errorMessage'] = "Invalid Email/Password";
}

if (isset($_POST['password']) && is_string(($_POST['password'] = InputFilter::filter($_POST['password'])))) {
    if (strlen($_POST['password']) > 7) {
        $count++;
    }
    else $message['errorMessage'] = "Invalid Email/Password";
}


if ($count == 2) {
   // $hashedPaswd = crypt($_POST['password'], CRYPT_STD_DES);

    // $member = Member::wherePassword($hashedPaswd);
    $realtor = Realtor::whereEmailAndPassword($_POST['email'], $_POST['password']);

    if (!is_null($realtor)) {
        session_start();
        $_SESSION['realtor_id'] = $realtor->getID();
        header('Location: properties.php');
    } else {
        //echo '<h3>Could not find</h3>';
        //echo $hashedPaswd;

        $realtorLogInPage = new RealtorLogIn();
        $realtorLogInPage->setMessage($message);
        $realtorLogInPage->display();
    }
} else {

$realtorLogIn = new RealtorLogIn();
 $realtorLogIn->setMessage($message);
$realtorLogIn->display();
}


