<?php

/**
 * This is a class Footer responsible for displaying the bottom part of a web page.
 *
 * @author sashi
 */
class Footer
{
    public function __construct()
    {

    }

    public function display()
    {
?>
        <!-- Begin footer -->
        <div id="footer">
          <div class="container">
              <div class="col-sm-1">
                  <a href="privacy.php">Privacy</a>
              </div>
              <div class="col-sm-1 longword">
                <!--  <a href="#disclaimer">Disclaimer</a>  -->
              </div>
              <div class="col-sm-1">
                <!--  <a href="#info">Link</a>  -->
              </div>
              <div class="col-sm-7">
                  <!--<a href="#info">Info</a> -->
              </div>
              <div class="col-sm-2">
                  &copy; Sweet Homes 2014
              </div>
          </div>
        </div>
        <!-- End footer -->
        
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57716560-1', 'auto');
  ga('send', 'pageview');

</script>
<?php
     }
}
