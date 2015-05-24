<?php

/**
 * This is a class Header that is responsible for displaying the top head part of a page
 * including nav bars.
 *
 */
class AdminHeader {

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

            <div class="collapse navbar-collapse navlist" id="myNavbar" style="margin-top: 30px;">
                <ul class="av navbar-nav navbar-right">
                    <li><a href="propertyList.php" style="margin-right: 20px; color: saddlebrown;">Log Out</a></li>
                </ul>

            </div>
        </div>


        <div id="classProject" style="margin: 49px; margin-bottom: 15px; color: red;">
            <p>  SFSU Software Engineering Project, Fall 2014. For Demonstration Only  </p>
        </div>

        <?php
    }

}
