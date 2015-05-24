<?php



require_once("SweetHomeAutoloader.php");

session_start();

if (isset($_SESSION['user_id'])) {
    
    $addData = 0;
    $data = array();
    $error_message = "none";
    
    $data['member_id']= $_SESSION['user_id'];
    
    if(isset($_POST['city']) && !empty($_POST['city'])){
        $addData++;
        $data['City'] = InputFilter::filter($_POST['city']);
        //echo 'city';
    }
    
    if(isset($_POST['zip']) && !empty($_POST['zip'])){
        $addData++;
        $data['Zip'] = InputFilter::filter($_POST['zip']); 
        //echo'zip';
    }
    
    if(isset($_POST['neighborhood']) && !empty($_POST['neighborhood'])){
        $addData++;
        $data['Neighbourhood'] = InputFilter::filter($_POST['neighborhood']);
        //echo'neighborhood';
    }
    
    if(isset($_POST['bedrooms']) && !empty($_POST['bedrooms'])){
        $addData++;
        $data['Bedrooms'] = InputFilter::filter($_POST['bedrooms']);
        //echo'bedrooms';
    }
    
    if(isset($_POST['bathrooms']) && !empty($_POST['bathrooms'])){
        $addData++;
        $data['Bathrooms'] = InputFilter::filter($_POST['bathrooms']);
        //echo 'bathrooms';
    }
    
    if(isset($_POST['maximumPrice']) && !empty($_POST['maximumPrice'])){
        $addData++;
        $data['MaximumPrice'] = InputFilter::filter($_POST['maximumPrice']);
        //echo 'price';
    }
    
    if(isset($_POST['minimumPrice']) && !empty($_POST['minimumPrice'])){
        $addData++;
        $data['MinimumPrice'] = InputFilter::filter($_POST['minimumPrice']);
        //echo 'price';
    }
    
    
    if($addData>=1){
        
        $propertyPreference = new PropertyPreference();
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


