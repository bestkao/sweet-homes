<?php

//include_once('Page.php');

class Privacy extends Page {

    public function __construct() {
        parent::__construct();
        ?>
        <html>
            <head>
                <title>Privacy</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link rel="icon" href="images/favicon.ico">
                <!-- Custom styles for this template -->
                <link href="css/Header.css" rel="stylesheet">
                <link href="css/Privacy.css" rel="stylesheet">
                <link href="css/Footer.css" rel="stylesheet">
            </head>
        <?php
    }

    public function display() {
        $this->header->display();
        $this->displayContent();
        $this->footer->display();
        $this->dropDownScript();
    }

    public function displayContent() {
        ?>
            <div class="Sell">
                <div class="jumbotron">
                    <h2>Our Privacy Policy</h2>

 <p>
Sweet Homes respects your privacy and is committed to protect your personal information.
All the information collected from the user like personal details at the time of registration,
preferences etc will not be shared and only used for our private use.
<br><br>

<b>What information we require </b><br>
Registered Members would be required to share following personal details: Name, email id
 and phone no. Apart from this, users have an option to share their preferences like prefered
 location for buying house, property type etc.
 <br><br>

<b>How we protect your information </b><br>
All the sensitive information like email id, password, phone numbers etc would be well
protected by industry approved-advanced encryption techniques. Also Sweet Homes makes sure
that the employees having access to user's data have undergone proper background check and they
sign legal confidentiality agreement.
<br><br>

<b>Who have access to your information </b>
Only authorized employees who have cleared background checks and have signed confidentiality
agreement have access to customer data.
<br><br>

<b>About cookies </b><br>
Sweet Homes might place some cookies on your computer or mobile device for uniquely
identifying the browser. Users can adjust their browser settings regarding cookies and
sharing of certain information.
<br><br>

<b>Additional information </b><br>
Google Analytics would be applied on user data to deliver better advertisements that
are valid and useful to you. If you are using social networks connections through services
offered by us, we might collect your profile information that you made available to be shared.
<br><br>

<b>Amendments </b><br>
If we decide to change our privacy policy, we will post changes on this page to keep you informed.


                    </p>
                </div>
            </div>

                </body>
                </html>
                <?php
            }

//put your code here
        }
