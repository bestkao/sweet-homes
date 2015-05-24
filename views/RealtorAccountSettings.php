<?php
//require ("Page.php");

/**
 * Description of Realtor Account Settings
 *
 */
class RealtorAccountSettings extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Realtor Account Settings</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/RealtorAccountSettings.css" rel="stylesheet">

                <script src="js/warning.js"></script>



            </head>    
            <?php
        }

        public function display() {
            $this->realtorheader->display();
            $this->displayContent();
            $this->footer->display();
        }

        public function displayContent() {
            ?>
            <body> 

                <div class="AccountSetting">
                    <form class="form-horizontal" role="form">
                        <h2 class="form-horizontal-heading">Realtor Account Settings</h2>
                        <div class="form-horizontal-main">

                            <div class="form-password" >
                                <label class="col-sm-2 control-label lab1">new password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control pswd1"  placeholder="Password">
                                </div>
                            </div>

                            <div class="form-confirmPassword">
                                <label class="col-sm-2 control-label lab2">confirm password:</label>
                                <div class="col-sm-10 col1">
                                    <input type="password" class="form-control cpswd1"  placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-description" >
                                <label class="col-sm-2 control-label lab3 ">Realtor Description:</label>
                                <div class="col-sm-10 col2">
                                    <textarea class="form-textarea  text1"></textarea>
                                </div>
                            </div>
                            <div class="form-summit">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>


                    </form>    

                </div>   
            </div>





            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/workaround.js"></script>
        </body>
        </html>
        <?php
    }

}
