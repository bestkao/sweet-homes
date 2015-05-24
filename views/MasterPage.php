<?php

//require ("Page.php");
/**
 * Description of MasterPage
 *
 * @author sashi
 */
class MasterPage extends Page
{
    public function __construct()
    {
        parent::__construct();
        ?>
<head>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/Style.css" rel="stylesheet">
    <link href="css/PropertySearchListing.css" rel="stylesheet">
</head>
<?php
    }
    
    
    public function display() 
    {
        $this->header->display();
        $this->displayContent();
        $this->footer->display();
    }
    
    public function displayContent()
    {
 ?>
<br/><br/><br/><br/><br/><br/><br/>
<form action="masterPropertyAdder.php" method="post">
<table border=0>

<tr>
  <td>Address</td>
  <td align=left><input type="text" name="address" size=30 maxlength=40></td>
</tr>
<tr>
  <td>Address Unit</td>
  <td align=left><input type="text" name="addressUnit" size=10 maxlength=10></td>
</tr>
<tr>
  <td>City</td>
  <td align=left><input type="text" name="city" size=15 maxlength=20></td>
</tr>
<tr>
  <td>State</td>
  <td ><input type="text" name="state" size=2 maxlength=2></td>
</tr>
<tr>
  <td>Zip</td>
  <td ><input type="text" name="zip" size=10 maxlength=8></td>
</tr>
<tr>
  <td>Description Short</td>
  <td ><input type="text" name="descriptionShort" size=40 maxlength=100></td>
</tr>
<tr>
  <td>Description Long</td>
  <td ><input type="text" name="descriptionLong" size="100"</td>
</tr>
<tr>
  <td colspan=2 ><input type=submit value="Add"></td>
</tr>
</table>
</form>  
     
<?php
        
    }

//put your code here
}
