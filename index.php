<?php
require_once("SweetHomeAutoloader.php");

session_start();
$homePage = new Home();
            
$homePage->display();
          
    

