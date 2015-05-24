<?php
//require ("Page.php");

/**
 * Description of Admin View contains realtor, member and property listings
 *
 */
class Admin extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Admin</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/Admin.css" rel="stylesheet">

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

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation width1" class="active"><a href="#Realtors" role="tab" data-toggle="tab">Realtors</a></li>
                    <li role="presentation"><a href="#Members" role="tab" data-toggle="tab">Members</a></li>
                    <li role="presentation"><a href="#Listings" role="tab" data-toggle="tab">Listings</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Realtors">      
                        <p><a class="btn btn-primary firstbutton" href="addEditRealtor.php" role="button">Add Realtor</a></p>
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
                                            <td class="realtorlist" style="border-color: white">
                                                <text class="txt1">
                                                </text>
                                            </td>
                                            <td class="btn1" style="border-color: white"><a class="btn btn-primary secondbutton" href="addEditRealtor.php" role="button">Select</a></td>
                                            <td class="btn2" style="border-color: white"><button type="submit" class="btn btn-primary thirdbutton">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-default fourthbutton" type="submit">Delete</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Members">                
                        <div class="container newtable">
                            <div class="table-responsive">          
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="check2" style="border-color: white">
                                                <div class="txt1">
                                                    <label>
                                                        <input type="checkbox" id="blankCheckbox" value="option1">
                                                    </label>
                                                </div> 
                                            </td>
                                            <td class="memberlist" style="border-color: white">
                                                <text class="txt1">
                                                </text> 
                                            </td>
                                            <td class="btn1" style="border-color: white"><button type="submit" class="btn btn-primary firstbut">Delete</button></td>
                                            <td class="btn2" style="border-color: white"><button type="submit" class="btn btn-primary secondbut">Enable</button></td>
                                            <td class="btn3" style="border-color: white"><button type="submit" class="btn btn-primary thirdbut">Disable</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-default fourthbutton" type="submit">Delete</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Listings">                
                        <div class="container newtable">
                            <div class="table-responsive">          
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="check3" style="border-color: white">
                                                <div class="checkbox3">
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
