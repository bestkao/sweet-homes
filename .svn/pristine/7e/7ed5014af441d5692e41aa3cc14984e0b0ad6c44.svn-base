<?php
require_once("SweetHomeAutoloader.php");

session_start();

if (isset($_SESSION['user_id'])) {
  $listingPage = new PropertyList();
  $listingPage->display();
} 
else {
    $count = 0;
    $message = array();

    if (isset($_POST['email'])) {
        if (strlen($_POST['email']) > 7 && 
            is_string(($_POST['email']=  InputFilter::filter($_POST['email'])))) {
            $count++;
        }
    }

    if (isset($_POST['password'])
         && is_string(($_POST['password']=  InputFilter::filter($_POST['password'])))) {
        if (strlen($_POST['password']) > 7) {
            $count++;
        }
    }
    $message['errorMessage'] = "Invalid Email/Password";

    if ($count == 2) {
        $hashedPaswd = crypt($_POST['password'], CRYPT_STD_DES);

        // $member = Member::wherePassword($hashedPaswd);
        $member = Member::whereEmailAndPassword($_POST['email'], $hashedPaswd);

        if (!is_null($member)) {
            session_start();
            $_SESSION['user_id'] = $member->getID();
            header('Location: propertyList.php');
        } else {
            //echo '<h3>Could not find</h3>';
            //echo $hashedPaswd;

            $memberLogInPage = new MemberLogIn();
            $memberLogInPage->setMessage($message);
            $memberLogInPage->display();
        }
    } else {

        $memberLogInPage = new MemberLogIn();
//$memberLogInPage->setMessage($message);
        $memberLogInPage->display();
    }
}