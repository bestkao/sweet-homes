<?php

require_once("SweetHomeAutoloader.php");

session_start();

if(isset($_SESSION['realtor_id'])){
    
    $count=0;
    $data=array();
    if(isset($_POST['firstName']))
    {
        if( strlen($_POST['firstName'])>1){
        $_POST['firstName'] = InputFilter::filter($_POST['firstName']);
        $data['firstName']=$_POST['firstName'];
        echo $_POST['firstName'];
        $count++;
        }
        else unset($_POST['firstName']);
    }
    if(isset($_POST['lastName']))
    {
        if( strlen($_POST['lastName'])>1){
        $_POST['lastName'] = InputFilter::filter($_POST['lastName']);
        $data['lastName']=$_POST['lastName'];
        echo $_POST['lastName'];
        $count++;
        }
        else unset ($_POST['lastName']);
    }
    if(isset($_POST['email']))
    {
        if( strlen($_POST['email'])>1){
        $_POST['email'] = InputFilter::filter($_POST['email']);
        $data['email']=$_POST['email'];
        echo $_POST['email'];
        $count++;
        } 
        else unset($_POST['email']);
    }
    if(isset($_POST['password']))
    {
        if( strlen($_POST['password'])>1){
        $_POST['password'] = InputFilter::filter($_POST['password']);
        $data['password']=$_POST['password'];
        echo $_POST['password'];
        $count++;
        }
        else unset($_POST['password']);
    }
    
    if(isset($_POST['phoneMobile']))
    {
        if (strlen($_POST['phoneMobile']) > 1) {
            $_POST['phoneMobile'] = InputFilter::filter($_POST['phoneMobile']);
            if (InputFilter::validPhoneNumber($_POST['phoneMobile'])) {
                $data['phoneMobile'] = $_POST['phoneMobile'];
                echo $_POST['phoneMobile'];
                $count++;
            }
        }
        else unset($_POST['phoneMobile']);
    }
    
    if(isset($_POST['phoneOffice']))
    {
        echo"<br/><p>phoneOffice caught </p>";
        if (strlen($_POST['phoneOffice']) > 1) {
            $_POST['phoneOffice'] = InputFilter::filter($_POST['phoneOffice']);
            echo "<p>".$_POST['phoneOffice']."</p>";
            if (InputFilter::validPhoneNumber($_POST['phoneOffice'])) {
                $data['phoneOffice'] = $_POST['phoneOffice'];
                echo $_POST['phoneOffice'];
                $count++;
            }
        } else unset($_POST['phoneOffice']);
    }
    
    if(isset($_POST['about']))
    {
        if(strlen($_POST['about'])>1){
            $_POST['about'] = InputFilter::filter($_POST['about']);
            $data['about']=$_POST['about'];
            $count++;
        }
    }
    
    if($count>0)
    {
        echo "<p>count=".$count."</p>";
        $realtor= new Realtor();
        $realtor->setID($_SESSION['realtor_id']) ;   
        $realtor->setIsNew(false);
                //Realtor::find($_SESSION['realtor_id']);
        //$data= $realtor->buildDataArray();
        
        $realtor->setAll($data);
        $realtor->save();
        
    }
    
    
    $settings = new AccountSetting();
    $settings->display();        
}

