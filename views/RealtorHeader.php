<?php

/**
 * This is a class Header that is responsible for displaying the top head part of a page
 * including nav bars.
 *
 */
class RealtorHeader {

    public function __construct() {
        
    }

    public function display() {//display fancy navbar here.
        ?>
        <!-- Navigation Bar -->
        <div class="container-fluid navbar navbar-default navbar-fixed-top navibar" style="background-color: white;
             border-color: white;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div> 

            <div class="collapse navbar-collapse navlist" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="realtorAccountSettings.php">  <h5><font color="saddlebrown">Account Settings</font></h5></a></li>
                    <li><a href="realtorPropertyListing.php"> <h5><font color="saddlebrown">Properties</font></h5></a></li>
                    <li><a href="propertyListing.php"> <h5><font color="saddlebrown">Log Out</font></h5></a></li>
                </ul>

            </div>
        </div>


        <div id="classProject" style="margin: 58px; margin-bottom: 3px;">
            <p><font color="red"> SFSU Software Engineering Project, Fall 2014. For Demonstration Only </font> </p>
        </div>




        <?php
    }

}
