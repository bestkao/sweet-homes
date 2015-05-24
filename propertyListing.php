<?php
require_once("SweetHomeAutoloader.php");

$listing = new PropertyListing();
$listing->setErrorMessage("<p>Sorry! We don't have your desired Property yet</p>"
        . "<p>We will notify you as soon as we have a property that matches your Preference.</p>");
if(isset($_GET['clause'])){
    $listing->setWhereClause($_GET['clause']);
}else $listing->setWhereClause("city='Oakland'");
$listing->displayListing();

