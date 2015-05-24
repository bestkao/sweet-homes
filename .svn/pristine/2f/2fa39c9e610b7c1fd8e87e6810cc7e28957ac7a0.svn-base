<?php

require_once("SweetHomeAutoloader.php");

session_start();

if (isset($_GET['pid'])) {
    $propertyDetailsPage = new PropertyDetails($_GET['pid']);
    $propertyDetailsPage->display();
}
