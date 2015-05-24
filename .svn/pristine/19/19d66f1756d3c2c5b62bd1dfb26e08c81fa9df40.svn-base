<?php
require_once("SweetHomeAutoloader.php");

session_start();

if (isset($_SESSION['user_id']) && isset($_GET['p-i-d'])) {
    
    $addData = 0;
    $data = array();
    $error_message = "none";
    
    $data['member_id']= $_SESSION['user_id'];
    
    if(isset($_POST['city']) && strlen($_POST['city'])>=3){
        $addData++;
        $data['City'] = InputFilter::filter($_POST['city']);
        //echo 'city';
    }
    
    if(isset($_POST['zip']) && strlen($_POST['zip'])>=3){
        $addData++;
        $data['Zip'] = InputFilter::filter($_POST['zip']); 
        //echo'zip';
    }
    
    if(isset($_POST['neighborhood']) && strlen($_POST['neighborhood'])>=3){
        $addData++;
        $data['Neighbourhood'] = InputFilter::filter($_POST['neighborhood']);
        //echo'neighborhood';
    }
    
    if(isset($_POST['bedrooms']) && strlen($_POST['bedrooms'])>=1){
        $addData++;
        $data['Bedrooms'] = InputFilter::filter($_POST['bedrooms']);
        //echo'bedrooms';
    }
    
    if(isset($_POST['bathrooms']) && strlen($_POST['bathrooms'])>=1){
        $addData++;
        $data['Bathrooms'] = InputFilter::filter($_POST['bathrooms']);
        //echo 'bathrooms';
    }
    
    if(isset($_POST['maximumPrice']) && strlen($_POST['maximumPrice'])>=4){
        $addData++;
        $data['MaximumPrice'] = InputFilter::filter($_POST['maximumPrice']);
        //echo 'price';
    }
    
    if(isset($_POST['minimumPrice']) && strlen($_POST['minimumPrice'])>=4){
        $addData++;
        $data['MinimumPrice'] = InputFilter::filter($_POST['minimumPrice']);
        //echo 'price';
    }
    
    
    if($addData>=1){
        
        $propertyPreference = PropertyPreference::find($_GET['p-i-d']);
        $propertyPreference->setAll($data);
        $propertyPreference->save();
        if(!$propertyPreference->getIsNew()){
           header('Location: memberProfile.php?content=preference_added');
        }
        else header('Location: memberProfile.php'); 
        
    }
    else{
        header('Location: memberProfile.php'); 
    }
    
    
    
}