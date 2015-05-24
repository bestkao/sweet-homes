<?php
//require ("Page.php");

/**
 * Description of Admin Account Settings
 *
 */
class AdminAccountSettings extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Admin | Account Settings</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/extra.css" rel="stylesheet">
                <link href="css/AdminAccountSettings.css" rel="stylesheet">

                <script src="js/warning.js"></script>





            </head>    
            <?php
        }

        public function display() {
            $this->adminheader->display();
            $this->displayContent();
            $this->adminfooter->display();
        }

        public function displayContent() {
            ?>
            <body>    

                <div class="AccountSetting">
                    <form class="form-horizontal" role="form">
                        <h2 class="form-horizontal-heading">Admin Account Settings</h2>
                        <div class="form-horizontal-main">
                            <div class="form-group" >
                                <label  class="col-sm-2 control-label lab1">User Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control name1" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-password" >
                                <label  class="col-sm-2 control-label lab2">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control pass1" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="form-confirmPassword">
                                <label  class="col-sm-2 control-label lab3">Confirm Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control pass2" placeholder="Password" required>
                                </div>
                            </div>


                            <div class="form-summit">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>    
                </div>  


                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/workaround.js"></script>
            </body>
        </html>
        <?php
    }

}
