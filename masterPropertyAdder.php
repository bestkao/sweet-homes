<?php
    require_once("SweetHomeAutoloader.php");
    
    $addData=0;
    $address=null;
    $addressUnit=null;
    $city = null;
    $state = null;
    $zip=null;
    $shortDescription=null;
    $longDescription=null;
    
    if(isset($_POST['address'])==true && empty($_POST['address'])==false)
    {
        $address = $_POST['address'];
        $addData++;
    }
    if(isset($_POST['addressUnit'])==true && empty($_POST['addressUnit'])==false)
    {
        $addressUnit = $_POST['addressUnit'];
        $addData++;
    }
    if(isset($_POST['city'])==true && empty($_POST['city'])==false)
    {
        $city = $_POST['city'];
        $addData++;
        
    }
    if(isset($_POST['state'])==true && empty($_POST['state'])==false)
    {
        $state = $_POST['state'];
        $addData++;
    }
    if(isset($_POST['zip'])==true && empty($_POST['zip'])==false)
    {
        $zip = $_POST['zip'];
        $addData++;
    }
    if(isset($_POST['descriptionShort'])==true && empty($_POST['descriptionShort'])==false )
    {
        $shortDescription = $_POST['descriptionShort'];
        $addData++;
    }
    if(isset($_POST['descriptionLong'])==true && empty($_POST['descriptionLong'])==false)
    {
        $longDescription = $_POST['descriptionLong'];
        $addData++;
    }
    
    if(isset($_POST["submit"])==true || $_POST["Add"]==true)
    {
       // echo '<p> Image post method caught!</p>';
       // echo '<p>'.$_POST['fileToUpload'].'</p>';
        if( is_uploaded_file($_FILES['fileToUpload']['tmp_name']) && getimagesize($_FILES["fileToUpload"]["tmp_name"])!=false)
        {
           // echo'<p>Entire image file caught</p>';
            $upload_dir = "images/properties_full/";
            $upload_file = $upload_dir . basename($_FILES["fileToUpload"]["name"]);
             $addData++;    
        }
        
    }
    
    
    //echo "AddData=".$addData."<br/>";
   if ($addData == 8) {
    //include_once 'models/ModelDatabase.php';
    //include_once 'models/PropertyAdder.php';
    //include_once 'models/PropertyRemover.php';
    //include_once 'models/PropertyEditor.php';
    //include_once 'models/PropertyGetter.php';
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        $_POST['imageFilename'] = $upload_file;
        $property = new Property();
        /*$property->setAddress($_POST['address']);
        $property->setAddressUnit($_POST['addressUnit']);
        $property->setCity($_POST['city']);
        $property->setZip($_POST['zip']);
        $property->setState($_POST['state']);
        $property->setLongDescription($_POST['descriptionLong']);
        $property->setShortDescription($_POST['descriptionShort']);
        $property->setImageFileName($upload_file);*/
        $property->setAll($_POST);
        $property->save();
        $propertyList = new PropertyList();
        $propertyList->display();
         //header("Location: propertyList.php");
    } else {
       // echo "Sorry, there was an error uploading your file.";
    }
} else {
    //include_once 'views/MasterPage.php';

    //$masterPage = new MasterPage();
    //$masterPage->display();
      $sellPage = new Sell();
      $sellPage->display();
}
?>