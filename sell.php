<?php

require_once("SweetHomeAutoloader.php");
include 'views/Sell.php';

if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_GET['to'])){
    
$count = 0;
$data=array();
$data['contactType']="Sell";

if(isset($_SESSION['user_id'])) $data['memberId']=$_SESSION['user_id'];

if (isset($_POST['name']) && (strlen($_POST['name'])>2)) {
    $count++;
    $data['name']=  InputFilter::filter($_POST['name']);
}
if (isset($_POST['email']) && (strlen($_POST['email'])>2)) {
    $count++;
    $data['email']=  InputFilter::filter($_POST['email']);
}
if (isset($_POST['message']) && (strlen($_POST['message'])>2)) {
    $count++;
    $data['message']=  InputFilter::filter($_POST['message']);
}

$sellPage = new Sell();

if ($count == 3) {
    echo "<p>yes got 3 post</p>";   

    $subject = 'Contact-subject';
    $message = $_POST['message'];
    $to = 'sthapa@sfsuswe.com';
    $type = 'plain'; // or HTML
    $charset = 'utf-8';

   // $mail = 'no-reply@' . str_replace('www.', '', $_SERVER['SERVER_NAME']);
    $mail = $_POST['email'];
    $uniqid = md5(uniqid(time()));
    $headers = 'From: ' .$_POST['name'].' <'. $mail .">\n";
    $headers .= 'Reply-to: ' . $mail . "\n";
    $headers .= 'Return-Path: ' . $mail . "\n";
    $headers .= 'Message-ID: <' . $uniqid . '@' . $_SERVER['SERVER_NAME'] . ">\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Date: ' . gmdate('D, d M Y H:i:s', time()) . "\n";
    $headers .= 'X-Priority: 3' . "\n";
    $headers .= 'X-MSMail-Priority: Normal' . "\n";
    $headers .= 'Content-Type: multipart/mixed;boundary="----------' . $uniqid . '"' . "\n\n";
    $headers .= '------------' . $uniqid . "\n";
    $headers .= 'Content-type: text/' . $type . ';charset=' . $charset . '' . "\n";
    $headers .= 'Content-transfer-encoding: 7bit';

   // mail($to, $subject, $message, $headers);

    $mailSent = array();

    if(mail($to, $subject, $message, $headers)){
    
        $mailSent['mail_sent'] = "Thanks!!  Your message has been sent.";
        $sellPage->setMessage($mailSent);
    } else {
        $mailSent['mail_sent'] = "Sorry! Message could not be sent.";
        $sellPage->setMessage($mailSent);
    }
    
    $contact = new Contact();
    $contact->setAll($data);
    $contact->save();
    
}


$sellPage->display();
}
else if(isset($_SESSION['user_id'])){
    
  $count=0;
  $data=array();
  $property = Property::find(InputFilter::filter($_GET['to']));
  $data['realtor']=  (string)$property->getRealtorId();
  $data['propertyId']= intval($property->getID());
  $data['memberId']=$_SESSION['user_id'];
  $data['contactType']='Property';
  
  if(isset($_POST['name']) && strlen($_POST['name'])>=2){
     $data['name']= InputFilter::filter($_POST['name']) ;
     $count++;
  }
  
  if(isset($_POST['email']) && strlen($_POST['email'])>=7){
     $data['email']= InputFilter::filter($_POST['email']) ;
     $count++;   
  }
  
  if(isset($_POST['message']) && strlen($_POST['message'])>=2){
     $data['message']= InputFilter::filter($_POST['message']) ;
     $count++;   
  }
  $listingPage = new PropertyList();
  if ($count >= 3) {
        $contact = new Contact();
        $contact->setAll($data);

        $contact->save();
        
        $listingPage->message['sent'] = "<p>Your message has been successfully sent</p>";
        
    }else $listingPage->message['sent'] = "<p>Please enter all the data to send your message</p>";
    
    $listingPage->display();
    
}
