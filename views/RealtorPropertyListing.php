<?php
//require ("Page.php");

/**
 * Description of Realtor's Property Listing
 *
 */
class RealtorPropertyListing extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Realtor Property Listings</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/RealtorPropertyListing.css" rel="stylesheet">

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
                <h2>[Realtor's Name] List of Properties</h2>
                <p><a class="btn btn-primary firstbutton" href="addEditListing.php" role="button">Add Listing</a></p>
                <div class="container newtable">
                    <div class="table-responsive">          
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="check1" style="border-color: white">
                                        <div class="checkbox1">
                                            <label>
                                                <input type="checkbox" id="blankCheckbox" value="option1">
                                            </label>
                                        </div> 
                                    </td>
                                    <td class="proplist" style="border-color: white">
                                        <text class="txt1">
                                        </text> 
                                    </td>
                                    <td class="btn1" style="border-color: white"><button type="submit" class="btn btn-primary but1">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-default fourthbutton" type="submit">Delete</button>
                </div>





                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/workaround.js"></script>
            </body>
        </html>
        <?php
    }

}
