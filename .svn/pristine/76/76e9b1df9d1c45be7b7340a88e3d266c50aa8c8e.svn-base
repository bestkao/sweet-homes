<?php

require_once("SweetHomeAutoloader.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $listingPage = new PropertyList();
    $listingPage->display();
} 
else {
    $message = array();
    $count = 0;
    if (isset($_POST['email'])) {
         $_POST['email'] = InputFilter::filter($_POST['email']);
        if ($_POST['email'] && strlen($_POST['email']) > 7) {
            $count++;
            //echo 'here';
            //$_POST['email'] = InputFilter::filter($_POST['email']);
            //echo $_POST['email'];
        } else
            $message['errorEmail'] = " Need proper email";
    }

    if (isset($_POST['password'])) {
         $_POST['password'] = InputFilter::filter($_POST['password']);
        if ($_POST['password'] && strlen($_POST['password']) >= 8) {

            $count++;
            //$_POST['password'] = InputFilter::filter($_POST['password']);
            //echo $_POST['password'];
        } else
            $message['errorPassword'] = "Password Length needs to be greater than seven";

       // echo 'here1';
    }
    if (isset($_POST['confirmPassword'])) {
        if (strcmp($_POST['password'], $_POST['confirmPassword']) == 0) {
            $count++;
            $_POST['password'] = crypt($_POST['password'], CRYPT_STD_DES);
            //echo $_POST['confirmPassword'];
        } else
            $message['errorConfirm'] = "Passwords do not match";
        //echo 'here2';
    }
    if (isset($_POST['terms']))
        $count++;


    if ($count == 4) {

        $member = Member::whereEmail($_POST['email']);
        if ($member instanceof Member) {
            $message['errorEmail'] = "Email is already taken";
        } else {
            $member = new Member();
            $member->setAll($_POST);
            $member->save();
            echo '<h3>Thanks for registering</h3>';
        }
    }

    $registrationPage = new Register();
    $registrationPage->setMessage($message);
    $registrationPage->display();
}