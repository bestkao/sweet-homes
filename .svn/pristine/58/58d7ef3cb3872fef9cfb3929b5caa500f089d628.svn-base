<?php

//include 'Header.php';
//include 'Footer.php';
//include 'AdminHeader.php';
//include 'AdminFooter.php';
//include 'RealtorHeader.php';

/**
 * This is an abstract Page class that provides the basic structure of a web page
 * This class should be extended by anyone interested in providing a functionality
 * of a complete single page.
 * @author sashi
 */
abstract class Page {

    protected $header = null;
    protected $footer = null;

    public function __construct() {
        $this->header = new Header();
        $this->footer = new Footer();
        $this->adminheader = new AdminHeader();
        $this->adminfooter = new AdminFooter();
        $this->realtorheader = new RealtorHeader();
    }

    public abstract function display();
    
    public function dropDownScript()
    {?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/dropsearch.js" type="text/javascript"></script>  
       <?php 
    }
}
