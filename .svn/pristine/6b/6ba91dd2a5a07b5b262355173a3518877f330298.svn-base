<?php
//require ("Page.php");

/**
 * Description of Adding and Editing Realtor
 *
 */
class AddEditRealtor extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html lang="en">
            <head>
                <meta charset="utf-8">    
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Admin | Add/Edit Realtor</title>

                <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="css/Style.css" rel="stylesheet">
                <link href="css/AddEditRealtor.css" rel="stylesheet">

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

                <div class="AddEdit">
                    <form class="form-horizontal" role="form">
                        <h2 class="form-horizontal-heading">Add/Edit Realtor</h2>
                        <div class="form-horizontal-main">

                            <div class="form-description" >
                                <label class="col-sm-2 control-label lab1">Realtor Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-textarea  text1"></textarea>
                                </div>
                            </div>

                            <div class="form-name">
                                <label class="col-sm-2 control-label lab2">Email:</label>
                                <div class="col-sm-10 col1">
                                    <input type="email" class="form-control email1"  placeholder="Email">
                                </div>
                            </div>

                            <div class="form-pass" >
                                <label class="col-sm-2 control-label lab3 ">Password:</label>
                                <div class="col-sm-10 col2">
                                    <input type="text" class="form-control password1" placeholder="Password">
                                </div>
                            </div>
                            <table class="table newtable">
                                <tbody>
                                    <tr>
                                        <td class="btn1" style="border-color: white"><button type="submit" class="btn btn-primary secondbutton">Delete</button></td>
                                        <td class="btn2" style="border-color: white"><button type="submit" class="btn btn-primary secondbutton">Save</button></td>
                                        <td class="btn3" style="border-color: white"><button type="submit" class="btn btn-primary thirdbutton">Enable</button></td>
                                        <td class="btn4" style="border-color: white"><button type="submit" class="btn btn-primary thirdbutton">Disable</button></td>
                                    <tr>
                                </tbody>
                            </table>


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
