<?php
require_once("SweetHomeAutoloader.php");

session_start();
$realtorsPage = new Realtors();
$realtorsPage->display();

