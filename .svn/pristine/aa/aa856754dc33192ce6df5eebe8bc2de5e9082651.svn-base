<?php

require_once("SweetHomeAutoloader.php");

session_start();

if(isset($_SESSION['realtor_id'])){
    $properties = new Properties();
    
   if (isset($_GET['add']) && $_GET['add']==1){
       $properties->setAdd();
   }
       
       
   if(!isset($_GET['list']) && isset($_GET['ed'])){
      $property= Property::find($_GET['ed']);
      if($property->getRealtorId() == $_SESSION['realtor_id']){
          $properties->setEditProperty($property);
      }
      else{
          $properties->display();
      }
   } 
   else{
   
   $actualProperties = Property::whereRealtorId($_SESSION['realtor_id']);
   $num_results = 0;

    if ($actualProperties != null) {
            $num_results = PropertyGetter::getTotalResults();
            $properties->setProperties($actualProperties);
    }
   }
   $properties->display();

}
else header('Location: realtorLogIn.php');
