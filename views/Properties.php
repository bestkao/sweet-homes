<?php

/**
 * Description of Properties
 *
 * @author sashi
 */
class Properties extends Page {

    private $properties;
    private $editProperty;
    private $add = false;

    public function __construct() {
        parent::__construct();
        ?>
        <html>
            <head>
                <title>Properties</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link rel="icon" href="images/favicon.ico">
                <!-- Custom styles for this template -->
                <link href="css/Header.css" rel="stylesheet">
                <link href="css/Properties.css" rel="stylesheet">
                <link href="css/Footer.css" rel="stylesheet">
            </head>
        <?php
    }

    public function setProperties($prop) {
        $this->properties = $prop;
    }

    public function setEditProperty($prop) {
        $this->editProperty = $prop;
    }

    public function setAdd() {
        $this->add = true;
    }


    private function displayAddImage()
    {?>
       <div class="control-group" style="background-color:#357ebd; opacity: 0.9;
            color:black;">
           <label class="control-label"  >Select Images:</label>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="position:relative;">
                                        <?php
                                        for($i=1; $i<6; $i++){
                                        ?>
                                        <div class="col-md-4">

                                            <input type="file" accept="image/*"
                                                   <?php
                                                   echo "name='fileToUpload".$i."'";
                                                   echo "id ='image".$i."'";


                                                   ?>
                                                   onchange="uploadImage(event,
                                                               <?php echo "'output".$i."'";?>, this.id)">

                                           <img
                                               <?php
                                               echo 'id="output'.$i.'"';
                                                       ?>/>
                                            <!--<script>
                                              var loadFile1 = function(event) {
                                                var output = document.getElementById('output1');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.style.height='200px';
                                                output.style.width= '200px';
                                              };
                                            </script>-->
                                        </div>
                                        <?php
                                        if($i%3==0){

                                            echo '</div>';
                                            echo '<div class="col-md-10 col-md-offset-1" style="position:relative;">';
                                            echo '<br/><br/>';
                                        }
                                        }?>
                                        <!--<div class="col-md-4">
                                            <input type="file" accept="image/*" name="fileToUpload2" id ="image2"
                                                   onchange="uploadImage(event, 'output2', this.id)">
                                            <img id="output2" />-->

                                        </div>
                                    </div>
                                </div>

                        </div>
            <br/><br/>




    <?php

    }
    /**
     *
     * @param type $type is edit or add
     */
    private function displayPropertyForm($type)
    {
        $is_add=false;

        if(strcmp($type, "add")==0){
            $is_add=true;
        }

        ?>
      <div class="jumbotron" style=" top:5%; left: 200px;">
                <form class="form-vertical"

                  <?php
                  if($is_add){
                      echo 'action="addProperty.php" ';
                  }
                  else{
                     echo "action='editProperties.php?id=" . $this->editProperty->getID() . "'";
                  }
                  ?>

                      method="POST" enctype="multipart/form-data"
                      name="myForm" onsubmit="return(validate());" >
                    <fieldset>
                        <div id="legend">
                            <?php if($is_add){
                                echo '<legend class="">Add Property</legend>';
                            }
                            else{
                                echo '<legend class="">Edit Property</legend>';
                            }
                                ?>

                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address</label>
                            <div class="controls">
                                <input type="text"  name="address"
                                       <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getAddress() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">

                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address Unit</label>
                            <div class="controls">
                                <input type="text"  name="addressUnit"
                                     <?php
                                       if(!$is_add){
                                        echo 'value="' . $this->editProperty->getAddressUnit() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">

                            </div>
                        </div>



                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Price</label>
                            <div class="controls">
                                <input type="text"  name="price"
                                     <?php
                                       if(!$is_add){
                                        echo 'value="' . $this->editProperty->getPrice() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Zip</label>
                            <div class="controls">
                                <input type="text"  name="zip"
                                     <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getZip() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>


                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Square Feet</label>
                            <div class="controls">
                                <input type="text" name="sqft"
                                     <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getSqft() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Lot Size</label>
                            <div class="controls">
                                <input type="text" name="lotSize"
                                     <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getLotSize() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Parking Spaces</label>
                            <div class="controls">
                                <input type="text" name="parkingSpaces"
                                     <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getParkingSpaces() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Year Built</label>
                            <div class="controls">
                                <input type="text" name="yearBuilt"
                                     <?php
                                       if(!$is_add){
                                         echo 'value="' . $this->editProperty->getYearBuilt() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Neighborhood</label>
                            <div class="controls">
                                <input type="text" name="neighborhood"
                                     <?php
                                       if(!$is_add){
                                          echo 'value="' . $this->editProperty->getNeighborhood() . '"';
                                       }
                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Short Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          id="message"
                                          name ="descriptionShort"><?php
                                       if(!$is_add){
                                         echo  $this->editProperty->getShortDescription();
                                       }
                                       ?>
                                </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Long Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          id="message"
                                          name ="descriptionLong" rows="5"><?php
                                       if(!$is_add){
                                          echo  $this->editProperty->getLongDescription();
                                       }
                                       ?>
                                </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                         <br/><br/>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Select status: </label>
<select name="status">
    <?php if(!$is_add){
        if(strcmp($this->editProperty->getStatus(),"sold")==0){
            echo'<option value="sold" selected="selected">Sold</option>';
            echo '<option value="listed">Listed</option>';
        }
        else{
           echo'<option value="listed" selected="selected">Listed</option>';
           echo '<option value="sold">Sold</option>';
        }
    }else{
        echo '<option value="sold">Sold</option>';
        echo '<option value="listed">Listed</option>';
    }?>




</select>
               <div class="control-group">
                   <label class="control-label" >City: </label>
                   <select name="city">
                      <?php
                         $cities = array("Alameda","Albany","Antioch",
                                    "Atherton","Belmont","Belvedere","Berkeley","Benicia",
                                    "Brentwood","San Francsico", "San Jose","San Mateo",
                                    "Oakloand","Richmond");
                            
                            foreach ($cities as $value) {
                                if(strcmp($city, $value)!=0){
                                   echo'<option value="'.$value.'">'.$value.'</option>'; 
                                }
                            } ?> 
                       </select>
                    </div>
                    <div class="control-group">
                            <!-- Password-->
                        <label class="control-label" >Select number of Bathrooms: </label>
                   <select name="bathrooms">
                 <?php
                    if(!$is_add){
                       $bathrooms = intval($this->editProperty->getBathrooms());

                       echo '<option value="'.$bathrooms.'">'.$bathrooms.'</option>';

                       if($bathrooms!=1)echo '<option value="1">1</option>';
                       if($bathrooms!=2)echo '<option value="2">2</option>';
                       if($bathrooms!=3)echo '<option value="3">3</option>';
                       if($bathrooms!=4)echo '<option value="4">4</option>';
                       if($bathrooms!=5)echo '<option value="5">5</option>';
                       if($bathrooms!=6)echo '<option value="6">6</option>';
                    }
                    else{
                       echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
                       echo '<option value="5">5</option>';
                       echo '<option value="6">6</option>';
                    }
                 ?>


</select>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Select number of Bedrooms: </label>
                 <select name="bedrooms">
                 <?php
                    if(!$is_add){
                       $bedrooms = intval($this->editProperty->getBedrooms());

                       echo '<option value="'.$bedrooms.'">'.$bedrooms.'</option>';

                       if($bedrooms!=1)echo '<option value="1">1</option>';
                       if($bedrooms!=2)echo '<option value="2">2</option>';
                       if($bedrooms!=3)echo '<option value="3">3</option>';
                       if($bedrooms!=4)echo '<option value="4">4</option>';
                       if($bedrooms!=5)echo '<option value="5">5</option>';
                       if($bedrooms!=6)echo '<option value="6">6</option>';
                    }
                    else{
                       echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
                       echo '<option value="5">5</option>';
                       echo '<option value="6">6</option>';
                    }
                 ?>

</select>

                        </div>
                        <br/><br/>
                                               <br/><br/>
                           <?php
                                if($is_add){
                                    $this->displayAddImage();
                                }

                                ?>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                                                <?php
                                if($is_add){
                                    echo '<button class="btn btn-success" value="add" name="add">
                                    Add
                                </button>';
                                }
                                else {
                                    echo '<button class="btn btn-success" value="add" name="add">
                                    Edit
                                </button>';
                                }
                                ?>

                            </div>
                        </div>






                    </fieldset>
                </form>
            </div>

            <?php

    }

    private function displayEdit()
    {
        ?>
            <div class="jumbotron" style=" top:5%; left: 200px;">
                <form class="form-vertical"
            <?php echo "action='editProperties.php?id=" . $this->editProperty->getId() . "'";
            ?>
                      method="POST">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Edit Property</legend>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address</label>
                            <div class="controls">
                                <input type="text"  name="address"
                                       <?php

                                          echo 'value="' . $this->editProperty->getAddress() . '"';

                                       ?>
                                       class="input-xlarge">

                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address Unit</label>
                            <div class="controls">
                                <input type="text"  name="addressUnit"
                                     <?php

                                        echo 'value="' . $this->editProperty->getAddressUnit() . '"';

                                       ?>
                                       class="input-xlarge">

                            </div>
                        </div>

                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" >City</label>
                            <div class="controls">
                                <input type="text"  name="city"
                                     <?php

                                        echo 'value="' . $this->editProperty->getCity() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Price</label>
                            <div class="controls">
                                <input type="text"  name="price"
                                     <?php

                                        echo 'value="' . $this->editProperty->getPrice() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Zip</label>
                            <div class="controls">
                                <input type="text"  name="zip"
                                     <?php

                                          echo 'value="' . $this->editProperty->getZip() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>


                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Square Feet</label>
                            <div class="controls">
                                <input type="text" name="sqft"
                                     <?php

                                          echo 'value="' . $this->editProperty->getSqft() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Lot Size</label>
                            <div class="controls">
                                <input type="text" name="lotSize"
                                     <?php

                                          echo 'value="' . $this->editProperty->getLotSize() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Parking Spaces</label>
                            <div class="controls">
                                <input type="text" name="parkingSpaces"
                                     <?php

                                          echo 'value="' . $this->editProperty->getParkingSpaces() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Year Built</label>
                            <div class="controls">
                                <input type="text" name="yearBuilt"
                                     <?php

                                         echo 'value="' . $this->editProperty->getYearBuilt() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Neighborhood</label>
                            <div class="controls">
                                <input type="text" name="neighborhood"
                                     <?php

                                          echo 'value="' . $this->editProperty->getNeighborhood() . '"';

                                       ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Short Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          id="message"
                                          name ="descriptionShort"><?php

                                         echo  $this->editProperty->getShortDescription();

                                       ?>
                                </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Long Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          id="message"
                                          name ="descriptionLong" rows="5"><?php

                                          echo  $this->editProperty->getLongDescription();

                                       ?>
                                </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>

                                                      <br/><br/>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Select status: </label>
<select name="status">
    <?php
        if(strcmp($this->editProperty->getStatus(),"sold")==0){
            echo'<option value="sold" selected="selected">Sold</option>';
            echo '<option value="listed">Listed</option>';
        }
        else{
           echo'<option value="listed" selected="selected">Listed</option>';
           echo '<option value="sold">Sold</option>';
        }
    ?>




</select></div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Select number of Bathrooms: </label>
                 <select name="bathrooms">
                 <?php

                       $bathrooms = intval($this->editProperty->getBathrooms());

                       echo '<option value="'.$bathrooms.'">'.$bathrooms.'</option>';

                       if($bathrooms!=1)echo '<option value="1">1</option>';
                       if($bathrooms!=2)echo '<option value="2">2</option>';
                       if($bathrooms!=3)echo '<option value="3">3</option>';
                       if($bathrooms!=4)echo '<option value="4">4</option>';
                       if($bathrooms!=5)echo '<option value="5">5</option>';
                       if($bathrooms!=6)echo '<option value="6">6</option>';


                 ?>


</select>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Select number of Bedrooms: </label>
                 <select name="bedrooms">
                 <?php

                       $bedrooms = intval($this->editProperty->getBedrooms());

                       echo '<option value="'.$bedrooms.'">'.$bedrooms.'</option>';

                       if($bedrooms!=1)echo '<option value="1">1</option>';
                       if($bedrooms!=2)echo '<option value="2">2</option>';
                       if($bedrooms!=3)echo '<option value="3">3</option>';
                       if($bedrooms!=4)echo '<option value="4">4</option>';
                       if($bedrooms!=5)echo '<option value="5">5</option>';
                       if($bedrooms!=6)echo '<option value="6">6</option>';


                 ?>

</select>

                        </div>
                        <br/><br/>

                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Edit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        <?php

    }
    private function displayEditForm()
    {
        ?>
            <div class="jumbotron" style=" top:5%; left: 200px;">
                <form class="form-vertical"
            <?php echo "action='editProperties.php?id=" . $this->editProperty->getId() . "'";
            ?>
                      method="POST">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Edit Property</legend>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address</label>
                            <div class="controls">
                                <input type="text"  name="address"
        <?php echo 'placeholder="' . $this->editProperty->getAddress() . '"'; ?>
                                       class="input-xlarge">

                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address Unit</label>
                            <div class="controls">
                                <input type="text"  name="addressUnit"
        <?php echo 'placeholder="' . $this->editProperty->getAddressUnit() . '"'; ?>
                                       class="input-xlarge">

                            </div>
                        </div>

                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" >City</label>
                            <div class="controls">
                                <input type="text"  name="city"
        <?php echo 'placeholder="' . $this->editProperty->getCity() . '"'; ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Price</label>
                            <div class="controls">
                                <input type="text"  name="price"
        <?php echo 'placeholder="' . $this->editProperty->getPrice() . '"'; ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Zip</label>
                            <div class="controls">
                                <input type="text"  name="zip"
        <?php echo 'placeholder="' . $this->editProperty->getZip() . '"'; ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Status
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" value="sold">Sold</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1"value="listed">Listed</a></li>

  </ul>
</div>
                            <!-- Password-->
                            <label class="control-label" >status</label>
                            <div class="controls">
                                <input type="text" name="status"
        <?php echo 'placeholder="' . $this->editProperty->getStatus() . '"'; ?>
                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>




                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Edit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        <?php
    }

    public function displayAdd() {
        ?>
            <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                <div class="media">




                    <div class="clearfix visible-sm"></div>
                    <div class="media-body fnt-smaller">


                        <small class="pull-right">
                            <p><a  class="btn btn-primary" role="button"
        <?php echo"href='properties.php?add=1'"; ?>>Add Property</a>

                        </small>
                        </a></h4>


                                                                <!--<p> Price
        <?php
        //echo '$' . $this->properties[$i]->getPrice();
        ?>
                                                                </p>
                                                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">

                                                                    <li>

                                                                        Beds,</li>
                                                                    <li>
                        <?php //echo $this->properties[$i]->getBathrooms(); ?>
                                                                        Baths,</li>
                                                                    <li>
        <?php //echo $this->properties[$i]->getSqft();  ?>
                                                                        SqFt</li>

                                                                </ul>


                                                                <p class="hidden-xs">
        <?php //echo $this->properties[$i]->getShortDescription();  ?>
                                                                </p>
                                                                <span class="fnt-smaller fnt-lighter fnt-arial"></span>
                        -->
                    </div>

                </div>
            </div>

                        <?php
                    }

        /*public function displayAddForm() {
                        ?>
            <div class="jumbotron" style=" top:5%; left: 200px;">
                <form class="form-vertical"

                      action="addProperty.php"
                      method="POST" enctype="multipart/form-data"
                      name="myForm" onsubmit="return(validate());">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Add Property</legend>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address</label>
                            <div class="controls">
                                <input type="text"  name="address"

                                       class="input-xlarge">

                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  >Address Unit</label>
                            <div class="controls">
                                <input type="text"  name="addressUnit"

                                       class="input-xlarge">

                            </div>
                        </div>

                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" >City</label>
                            <div class="controls">
                                <input type="text"  name="city"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Price</label>
                            <div class="controls">
                                <input type="text"  name="price"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Zip</label>
                            <div class="controls">
                                <input type="text"  name="zip"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >status</label>
                            <div class="controls">
                                <input type="text" name="status"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Bathrooms</label>
                            <div class="controls">
                                <input type="text" name="bathrooms"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Bedrooms</label>
                            <div class="controls">
                                <input type="text" name="bedrooms"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Square Feet</label>
                            <div class="controls">
                                <input type="text" name="sqft"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Lot Size</label>
                            <div class="controls">
                                <input type="text" name="lotSize"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Parking Spaces</label>
                            <div class="controls">
                                <input type="text" name="parkingSpaces"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Year Built</label>
                            <div class="controls">
                                <input type="text" name="yearBuilt"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Neighborhood</label>
                            <div class="controls">
                                <input type="text" name="nieghborhood"

                                       class="input-xlarge">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Short Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          name ="descriptionShort"> </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Long Description</label>
                            <div class="controls">
                                <textarea style="resize: none;" class="form-control"
                                          name ="descriptionLong" rows="5"> </textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" >Upload Images</label>


                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" style="position:relative;">
                                        <?php
                                        for($i=1; $i<6; $i++){
                                        ?>
                                        <div class="col-md-4">

                                            <input type="file" accept="image/*"
                                                   <?php
                                                   echo "name='fileToUpload".$i."'";
                                                   echo "id ='image".$i."'";


                                                   ?>
                                                   onchange="uploadImage(event,
                                                               <?php echo "'output".$i."'";?>, this.id)">

                                           <img
                                               <?php
                                               echo 'id="output'.$i.'"';
                                                       ?>/>
                                            <!--<script>
                                              var loadFile1 = function(event) {
                                                var output = document.getElementById('output1');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.style.height='200px';
                                                output.style.width= '200px';
                                              };
                                            </script>-->
                                        </div>
                                        <?php
                                        if($i%3==0){

                                            echo '</div>';
                                            echo '<div class="col-md-10 col-md-offset-1" style="position:relative;">';
                                            echo '<br/><br/>';
                                        }
                                        }?>
                                        <!--<div class="col-md-4">
                                            <input type="file" accept="image/*" name="fileToUpload2" id ="image2"
                                                   onchange="uploadImage(event, 'output2', this.id)">
                                            <img id="output2" />-->

                                        </div>
                                    </div>
                                </div>

                        </div>
                        <br/><br/>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success" value="add" name="add">
                                    Add
                                </button>
                            </div>
                        </div>






                    </fieldset>
                </form>
            </div><?php
                    }*/

   public function displayContent() {
                        ?>
            <br/><br/><br/><br/><br/>
            <div class="container-fluid navbar navbar-default " role="navigation">

                <!-- second menu bar to allow bread crums-->
                <ul class="nav navbar-nav list">
                    <li ><a id="listing" href="properties.php?list=1"

                            >Your Listing</a></li>

            <?php
            if ($this->editProperty instanceof Property) {
                ?>
                        <li><a>/</a> </li>
                        <li><a>Edit</a> </li>
            <?php } elseif ($this->add == true) {
            ?>
                        <li><a>/</a> </li>
                        <li><a> Add</a> </li>
            <?php
        }
        ?>
                </ul>

            </div>
            <div class="container-fluid" style="background-color:white">
                <div class="container container-pad" id="property-listings">


                    <div class="row">

                    <?php
                    //$this->displayAdd();
                    if (!$this->editProperty instanceof Property && !$this->add) {
                        $this->displayAdd();
                        for ($i = 0; $i < count($this->properties); $i++) {
                            ?>


                                <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                                    <div class="media">

                                        <a class="pull-left"
                                <?php
                                echo 'href="propertyDetails.php?pid=' . $this->properties[$i]->getID() . '"';
                                ?>
                                           target="_parent">
                                            <img alt="image"  class="img-responsive"  <?php echo'src="' . $this->properties[$i]->getThumbnailFileName() . '"'; ?> width="720" height="520">
                                        </a>


                                        <div class="clearfix visible-sm"></div>
                                        <div class="media-body fnt-smaller">
                                            <a href="#" target="_parent"></a>

                                            <h4 class="media-heading">
                                                <a href="#" target="_parent">
                                        <?php
                                        echo $this->properties[$i]->getAddress();
                                        ?>
                                                    <small class="pull-right">
                                                        <p><a
                <?php
                echo 'href="properties.php?ed=' . $this->properties[$i]->getID() . '"';
                ?>
                                                                class="btn btn-primary" role="button">Edit</a>
                                                            <a href="#" class="btn btn-default" role="button">Delete</a></p>
                                                    </small>
                                                </a></h4>


                                            <p>
                                                    <?php
                                                    echo '$' . $this->properties[$i]->getPrice();
                                                    ?>
                                            </p>
                                            <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">

                                                <li>
                <?php echo $this->properties[$i]->getBedrooms(); ?>
                                                    Beds,</li>
                                                <li>
                <?php echo $this->properties[$i]->getBathrooms(); ?>
                                                    Baths,</li>
                                                <li>
                                                <?php echo $this->properties[$i]->getSqft(); ?>
                                                    SqFt</li>

                                            </ul>


                                            <p class="hidden-xs">
                                                    <?php echo $this->properties[$i]->getShortDescription(); ?>
                                            </p>
                                            <span class="fnt-smaller fnt-lighter fnt-arial"></span>

                                        </div>

                                    </div>
                                </div><!-- End Listing-->
                <?php
            }
        } else if ($this->editProperty instanceof Property && !$this->add) {
            $this->displayEdit();
           //$this->displayEditform();
           //$this->displayPropertyForm("edit");
        } else if ($this->add) {
            //$this->displayAddForm();
            $this->displayPropertyForm("add");
        }
        ?>
                    </div>
                </div>
            </div>

            <!-- <div class="jumbotron">

        <form  id=add action="sell.php" method="post" enctype="multipart/form-data" >
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
                                 <td>Select image to upload:
                                     <input type="file" name="fileToUpload"  id="fileToUpload">
                                    <input type="submit" value="Upload Image" name="submit"></td>
                             </tr>
                             <tr>
                                 <td colspan=2 ><input type=submit value="Add" name="Add"></td>
                             </tr>
                         </table>
                     </form>
                  </div>-->
            <br/><br/><br/><br/>
            <script type='text/javascript'>
                function uploadImage(event, id, inputID) {
                    var output = document.getElementById(id);


                     var fup = document.getElementById(inputID);
                    var fileName = fup.value;
                    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                    if (ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
                    {
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.style.height = '200px';
                        output.style.width = '200px';
                        return true;
                    }
                    else
                    {
                        alert("Upload Gif or Jpg images only");
                        output.focus();
                        return false;
                    }
                }</script>
  <script>
                // Form validation code will come here.
function validate()
{

   if( document.myForm.address.value == "" )
   {
     alert( "Please provide Address!" );
     document.myForm.address.focus() ;
     return false;
   }
   if( document.myForm.city.value == "" )
   {
     alert( "Please provide city!" );
     document.myForm.EMail.focus() ;
     return false;
   }
   if( document.myForm.zip.value == "" ||
           isNaN( document.myForm.zip.value ) ||
           document.myForm.zip.value.length != 5 )
   {
     alert( "Please provide a zip in the format #####." );
     document.myForm.Zip.focus() ;
     return false;
   }
   if( document.myForm.price.value == "" )
   {
     alert( "Please provide Price!" );
     return false;
   }

   if(document.myForm.bathrooms.value=="")
   {
     alert( "Please provide Bathrooms!" );
     return false;
   }

   if(document.myForm.bedrooms.value=="")
   {
     alert( "Please provide Bedrooms!" );
     return false;
   }



   return( true );
}
            </script>
                <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/dropsearch.js" type="text/javascript"></script>


        <?php
    }

    public function display() {
        $this->header->display();
        $this->displayContent();
        $this->footer->display();
    }

}
