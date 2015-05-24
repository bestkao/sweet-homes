<?php

//include_once('Page.php');

/**
 * Description of Contact
 *
 * @author sashi
 */
class Contacts extends Page
{

    private $message;

    public function __construct()
    {
         parent::__construct();
         ?>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">


         <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="css/Header.css" rel="stylesheet">
   <link href="css/ContactUs.css" rel="stylesheet">
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


 <div class="ContactUs">

     <div class="container">
	<div class="row">

     <div class="col-md-7 col-md-offset-2" style="position:relative;">
                      <div class="panel panel-default">
                          <br/>
                    <div class="text-center header">Our Office</div>
                    <div class="panel-body text-center">
                        <h4>Address</h4>
                        <div>
                        SFSU<br />
                        <br />
                        Call Us At XXX-XXX-XXXX<br />

                       Or Send us message below
                        </div>


                    </div>


          <form class="form-horizontal" action="contact.php" method="post">
          <fieldset>
             <?php       if(isset($this->message['mail_sent'])){
            echo '<p><strong>'.$this->message['mail_sent'].'</strong></p>';
        }?>
            <legend class="text-center">Contact us</legend>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>

            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                  <textarea style="resize: none;" class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>

      </div>
	</div>

         </div>
</div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <?php

        ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/dropsearch.js" type="text/javascript"></script></script>




</html>
    <?php

    }

//put your code here
}
