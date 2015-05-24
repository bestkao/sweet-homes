<?php
//require ("Page.php");

/**
 * Description of Realtor's Adding and Editing Property Listing
 *
 */
class AddEditListing extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Realtor | Add/Edit Property Listing</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/AddEditListing.css" rel="stylesheet">

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
                <h2>Adding/Editing Property Listing</h2>
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
                <button class="btn btn-primary savebutton" type="submit">Save</button>






                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/workaround.js"></script>
            </body>
        </html>
        <?php
    }

}
