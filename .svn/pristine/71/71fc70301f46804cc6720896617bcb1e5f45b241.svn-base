<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Header
{
    public function __construct()
    {

    }

    public function display()
    { // display fancy navbar here.
        //session_start();
        ?>

        <!-- Header -->
        <div class="container-fluid navbar navbar-default navbar-fixed-top navibar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img alt="SweetHomes" src="images/minilogo.png"></img>
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navlist" id="myNavbar">
                    <ul class="nav navbar-nav list">
                        <?php
                        if(isset($_SESSION['realtor_id'])){
                        ?>
                         <li><a id="accountSettings" href="accountSettings.php">AccountSettings</a></li>
                        <li><a id="properties" href="properties.php">Properties</a></li>
                        <?php

                        } else{?>

                        <li><a id="buy" href="propertyList.php">Buy</a></li>
                        <li><a id="sell" href="sell.php">Sell</a></li>
                        <li><a id="realtor" href="realtors.php">Realtors</a></li>
                        <li><a id="about" href="about.php">About</a></li>
                        <li><a id="contact" href="contact.php">Contact</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right logList">
                        <?php if( isset($_SESSION['realtor_id'])){

                        ?>
                        <li><a id="signOut" href="logOut.php">LogOut</a></li>
                        <?php } else if(isset($_SESSION['user_id'])){
                            
                            ?>
                        <li class ="dropdown">
                            <a href ="#" class = "dropdown-toggle" data-toggle = "dropdown">
                                
                                Your Account<b class = "caret"></b></a>
                            <ul class ="dropdown-menu">
                                <li><a href="memberProfile.php">Profile</a></li>
                                <li><a href="realtorLogIn.php">Settings</a></li>
                                <li><a id="signOut" href="logOut.php">LogOut</a></li>
                            </ul>
                        </li>
                        <?php
                            
                        }
                        else{ ?>
                        <li><a id="signIn" href="register.php">Sign Up</a></li>
                        <li class ="dropdown">
                            <a href ="#" class = "dropdown-toggle" data-toggle = "dropdown">Sign In<b class = "caret"></b></a>
                            <ul class ="dropdown-menu">
                                <li><a href="memberLogIn.php">Member Login</a></li>
                                <li><a href="realtorLogIn.php">Realtor Login</a></li>
                               
                            </ul>
                        </li>
                        <?php

                        } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="classProject">
                          SFSU Software Engineering Project, Fall 2014. For Demonstration Only
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Header -->
<?php
    }
}
