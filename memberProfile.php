<?php
require_once("SweetHomeAutoloader.php");

session_start();

if(isset($_SESSION['user_id'])){
    $profile= new MemberProfile();
    $profile->display();
    
}

