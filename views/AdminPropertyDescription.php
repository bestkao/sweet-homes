<?php
//require ("Page.php");

/**
 * Description of AdminPropertyDescription
 *
 */
class AdminPropertyDescription extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Admin | Property Description</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/extra.css" rel="stylesheet">
                <link href="css/AdminPropertyDescription.css" rel="stylesheet">

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


                <h2 class="form-horizontal-heading">Property Description for Admin</h2>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Location</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cost</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lot Size</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Property Type</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detailed Description</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Images</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
                
                <button class="btn btn-default delbutton" type="submit">Delete</button>
                <a class="btn btn-primary backbutton" href="admin.php" role="button">Back</a>


                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/workaround.js"></script>
            </body>
        </html>
        <?php
    }

}
