<?php

//require ("Page.php");

/**
 * Description of Register
 *
 * @author sashi
 */
class Register extends Page
{
    private $message;

    public function __construct()
    {
         parent::__construct();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignUp</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/Header.css" rel="stylesheet">
    <link href="css/SignUp.css" rel="stylesheet">
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
    {?>
  <body>

    <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" method="post" action="register.php">
			<h2>Please Sign Up <small></small></h2>
			<hr class="colorgraph">
		
			
		
			<div class="form-group">
                            <?php if(isset($this->message['errorEmail'])) 
                                    echo '<p>'.$this->message['errorEmail'].'</p>';
                                ?>
                               
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                              <?php if(isset($this->message['errorPassword'])) 
                                    echo '<p>'.$this->message['errorPassword'].'</p>';
                                ?>
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                              <?php if(isset($this->message['errorConfirm'])) 
                                    echo '<p>'.$this->message['errorConfirm'].'</p>';
                                ?>
						<input type="password" name="confirmPassword" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
                                            <input type="checkbox" name="terms"  class="btn" data-color="info" tabindex="7">
					    I Agree</button>
                        <input type="checkbox" name="t" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
                            <p>
                                        Sweet Homes respects your privacy and is committed to protect your personal information. 
                                        All the information collected from the user like personal details at the time of 
                                        registration, preferences etc will not be shared and only used for our private use. 
                                        All the sensitive information like Credit Card/Debit Card details, SSN etc would be 
                                        well protected by industry approved-advanced encryption techniques. Also Sweet Homes 
                                        makes sure that the employees having access to user's data have undergone proper 
                                        background check and they sign legal confidentiality agreement. Sweet Homes might 
                                        place some cookies on your computer or mobile device for uniquely identifying the 
                                        browser. Users can adjust their browser settings regarding cookies and sharing of 
                                        certain information. Apart from this Google Analytics would be applied on user data 
                                        to deliver better advertisements that are valid and useful to you. If you are using 
                                        social networks connections through services offered by us, we might collect your 
                                        profile information that you made available to be shared.      
                                    </p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
    <script type="text/javascript">
    $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/dropsearch.js" type="text/javascript"></script>   


    </body>
  <?php

    }

}
