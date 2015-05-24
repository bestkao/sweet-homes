<?php

//require ("Page.php");

/**
 * Description of SignIn
 *
 * @author sashi
 */
class SignIn extends Page
{
    public function __construct()
    {
        parent::__construct();
    ?>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="css/Header.css" rel="stylesheet">
    <link href="css/SignUp.css" rel="stylesheet">
 <link href="css/Footer.css" rel="stylesheet">


    </head>
    <?php
    }

    public function display()
    {
        $this->header->display();
        $this->displayContent();
        $this->footer->display();
    }

    public function displayContent()
    {
    ?>
     <body>
        <!-- Registration -->
        <div class="ContactUs">
            <form class="form-horizontal" role="form">
                <h2 class="form-horizontal-heading">Registration</h2>
                <div class="form-horizontal-main">
                    <div class="form-group" >
                        <label  class="col-sm-2 control-label lab1">Name:</label>
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

                    <div class="form-Email" >
                        <label  class="col-sm-2 control-label lab4">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control email1"  placeholder="Email">
                        </div>
                    </div>

                    <div class="form-summit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/dropsearch.js" type="text/javascript"></script>


  </body>
</html>
    <?php

    }


    }
