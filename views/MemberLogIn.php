<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MemberLogIn
 *
 * @author sashi
 */
class MemberLogIn extends Page
{
    private $message;
    
    public function __construct()
    {
         parent::__construct();?>
                 <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Buy</title>
            <link rel="icon" href="images/favicon.ico">

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">


            <!-- Custom styles for this template -->
            <link href="css/Header.css" rel="stylesheet">
            <link href="css/MemberLogIn.css" rel="stylesheet" type="text/css"/>
            <link href="css/Footer.css" rel="stylesheet">
        </head>
<?php
    }
    
    public function setMessage($msg)
    {
        $this->message=$msg;
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
        
       <!-- <div class="container">

                    <form class="form-signin" role="form">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <input type="Email" class="form-control" placeholder="email" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" required>
            
                         
                        <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button 

                            <div class="col-sm-12 controls">
                                <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                            </div>
                        </div>


                       <div class="form-group">
                            <div class="col-md-12 control">
                                
                                                <label class="checkbox">
                           <input type="checkbox" value="remember-me"> Remember me
                        </label> 
                                    Don't have an account! 
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                        Sign Up Here
                                    </a>
                                
                            </div>
                        </div>    
                    </form>

                </div> -->
                            <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" method="post" action="memberLogIn.php">
			<h2>Please Sign In <small></small></h2>
			<hr class="colorgraph">
		
			
		
			<div class="form-group">
                             <?php 
                             if(isset($this->message['errorMessage']))
                                 echo '<p>'.$this->message['errorMessage'].'</p>'
                             ?>
                               
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                             
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
			
			</div>
			
			<label><a href="" color="green"> Forgot your password?</a></label>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="LogIn" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                                <div class="col-xs-10 col-md-5"><a href="register.php" role="button" class="btn btn-primary btn-block btn-lg" tabindex="7">Register</a></div>

                        </div>
		</form>
	</div>
</div>

<br/><br/><br/><br/><br/>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/dropsearch.js" type="text/javascript"></script>   
     
        
        
</html>
    <?php

    }

//put your code here
}

