<?php
if (!isset($_SESSION)) {
  session_start();
}

/**
 * Details of a single property
 * @author James
 */

class PropertyDetails extends Page
{
    private $property;

    public function __construct($pid)
    {
        $this->property=Property::find($pid);
        parent::__construct();
        ?>
        <!DOCTYPE html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Property Details</title>
            <link rel="icon" href="images/favicon.ico">

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">

            <!-- Custom styles for this template -->
            <link href="css/Header.css" rel="stylesheet">
            <link href="css/PropertyDetails.css" rel="stylesheet">
            <link href="css/Footer.css" rel="stylesheet">
        </head>
        <?php
    }

    public function display()
    {
        $this->header->display();
        $this->displayPropertyDetails();
        $this->footer->display();
    }

    public function displayPropertyDetails()
    {
        // session_start();
        if(!is_null($this->property) && $this->property instanceof Property)
        {
            ?>
            <!-- Property Details -->
            <div class="propertyDetails">

                <!-- Search -->
                <div class="jumbotron">
                  <div class="container">
                    <!-- Text -->
                    <div class="searchbar1 simple-search">
                      <form class="search" action="propertyList.php" method="post">
                        <input class="form-control SearchBox" name="searchData" value="" placeholder="Enter City, Neighborhood, Zip">
                        <button class="btn btn-primary ButtonSearch " type="submit">Search</button>
                      </form>
                    </div>
                    <!-- Filters -->
                    <div class="container2">
                      <div class="searchdropdownbar">
                        <ul class="nav nav-pills">
                          <li class="dropdown1">
                            <a href="#" class="dropdown-toggle1" data-toggle="dropdown">Price<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=">Any Price</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=200000">$200,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=400000">$400,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=600000">$600,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=800000">$800,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=1000000">$1,000,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=1500000">$1,500,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=2000000">$2,000,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=2500000">$2,500,000+</a></li>
                              <li><a href="propertyList.php?searchFld=price/&gt;=&amp;searchData=3000000">$3,000,000+</a></li>
                            </ul>
                          </li>
                          <li class="dropdown2">
                            <a href="#" class="dropdown-toggle2" data-toggle="dropdown"># of Bedrooms<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=">All Bedrooms</a></li>
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=1">1+ Bedrooms</a></li>
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=2">2+ Bedrooms</a></li>
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=3">3+ Bedrooms</a></li>
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=4">4+ Bedrooms</a></li>
                              <li><a href="propertyList.php?searchFld=bedrooms/&gt;=&amp;searchData=5">5+ Bedrooms</a></li>
                            </ul>
                          </li>
                          <li class="dropdown3">
                            <a href="#" class="dropdown-toggle3" data-toggle="dropdown">Property Type<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=">All Property Types</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=5">Single Family Home</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=4">Condo</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=2">Townhome</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=6">Co-op</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=7">Apartment</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=8">Loft</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=9">Mobile / Manufactured</a></li>
                              <li><a href="propertyList.php?searchFld=propertyTypeId/=&amp;searchData=10">Lot/Land</a></li>
                            </ul>
                          </li>
                          <li class="dropdown4">
                            <a id="dLabel" role="button" data-toggle="dropdown" class="nav nav-pills" data-target="#" href="/page.html">
                              More <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                              <li class="dropdown-submenu submenu1">
                                <a class="btn1" tabindex="-1" href="#"># of Bathrooms</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=">All Bathrooms</a></li>
                                  <li><a href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=1">1+ Bathrooms</a></li>
                                  <li><a href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=2">2+ Bathrooms</a></li>
                                  <li><a href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=3">3+ Bathrooms</a></li>
                                  <li><a href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=4">4+ Bathrooms</a></li>
                                  <li><a href="propertyList.php?searchFld=bathrooms/&gt;=&amp;searchData=5">5+ Bathrooms</a></li>
                                </ul>
                              </li><li class="dropdown-submenu submenu2">
                                <a class="btn2" tabindex="-1" href="#">Square Feet</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=">Any Square Footage</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=250">250+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=750">750+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=1000">1,000+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=1500">1,500+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=2000">2,000+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=3000">3,000+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=4000">4,000+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=5000">5,000+ sqft</a></li>
                                  <li><a href="propertyList.php?searchFld=sqft/&gt;=&amp;searchData=10000">10,000+ sqft</a></li>
                                </ul>
                              </li>
                              <li class="dropdown-submenu submenu3">
                                <a class="btn3" tabindex="-1" href="#">Listing Type</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="propertyList.php?searchFld=status/=&amp;searchData=">All Properties</a></li>
                                  <li><a href="propertyList.php?searchFld=status/=&amp;searchData=listed">For Sale</a></li>
                                  <li><a href="propertyList.php?searchFld=status/=&amp;searchData=sold">Sold</a></li>
                                </ul>
                              </li>
                              <li class="dropdown-submenu submenu4">
                                <a class="btn4" tabindex="-1" href="#">Age of Property</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=">Any Age</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=1">0-1 Years</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=5">0-5 Years</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=10">0-10 Years</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=20">0-20 Years</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&gt;=&amp;searchData=50">0-50 Years</a></li>
                                  <li><a href="propertyList.php?searchFld=yearBuilt/&lt;=&amp;searchData=50">50+ Years</a></li>
                                </ul>
                              </li>
                              <li class="dropdown-submenu submenu5">
                                <a class="btn5" tabindex="-1" href="#"># of Days on Market</a>
                                <ul class="dropdown-menu">
                                  <li><a tabindex="-1" href="propertyList.php?searchFld=dateListed/&gt;=&amp;searchData=">Any # of Days</a></li>
                                  <li><a href="propertyList.php?searchFld=dateListed/&gt;=&amp;searchData=25">0-25 Days</a></li>
                                  <li><a href="propertyList.php?searchFld=dateListed/&gt;=&amp;searchData=50">0-50 Days</a></li>
                                  <li><a href="propertyList.php?searchFld=dateListed/&gt;=&amp;searchData=75">0-75 Days</a></li>
                                  <li><a href="propertyList.php?searchFld=dateListed/&gt;=&amp;searchData=100">0-100 Days</a></li>
                                  <li><a href="propertyList.php?searchFld=dateListed/&lt;=&amp;searchData=100">100+ Days</a></li>
                                </ul>
                              </li>
                              <li role="presentation" class="divider"></li>
                              <li>
                                <form class="search" action="propertyList.php" method="post" id="dropform">
                                  <input class="form-control SearchBox" name="searchData" value="" placeholder="Search by Keyword">
                                  <button class="btn btn-primary ButtonSearch " type="submit">Search</button>
                                </form>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="buttons">
                      <a class="btn btn-primary" role="button">Clear Search</a>
                    </div>
                  </div>
                </div>
                <!-- End Search -->

                <!-- Address (Title) -->
                <?php
                echo '<h1>' . $this->property->getAddress() . '</h1>';
                echo '<h2>' . $this->property->getCity(). ', '
                            . $this->property->getState() . ' '
                            . $this->property->getZip() . '</h2>';
                ?>

                <!-- Listing content -->
                <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                  <div class="media">
                    <a class="pull-left"
                    <?php
                    // echo 'href="propertyDetails.php?pid=' . $properties[$i]->getID() . '"';
                    ?>
                    target="_parent">
                    <img alt="image1"  class="img-responsive" <?php echo 'src="' . $this->property->getThumbnailFileName() . '"'; ?> width="480" height="320">
                  </a>
                  <div class="clearfix visible-sm"></div>
                  <div class="media-body fnt-smaller">
                    <a href="#" target="_parent"></a>
                    <h4 class="media-heading">
                      <a href="#" target="_parent">
                        <small class="pull-right">
                          <!-- Small modal -->
                          <?php
                          if (!isset($_SESSION['user_id'])) {
                            ?>
                            <button type="submit" class="btn btn-primary btn1" data-toggle="modal" data-target=".bs-example-modal-sm">Contact Realtor</button>
                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <h3 style='text-align: center'>Please Login first</h3>
                                </div>
                              </div>
                            </div>
                            <?php
                          } else {
                            ?>
                            <a
                            <?php echo 'href="propertyList.php?to='.$this->property->getID().'"'; ?>
                            class="btn btn-default" role="button">Contact Realtor</a>
                            <!-- echo "<a href='mailto:f14g01@sfsuswe.com'> </a>"; -->
                            <?php
                          }
                          ?>


                        </small>
                      </a>
                    </h4>

                    <p>
                      <h3>
                        $<?php echo $this->property->getPriceFormatted();?>
                        <b style="color:red"> <?php echo $this->property->getStatus(); ?></b>
                      </h3>
                    </p>
                    <h4>
                      <?php echo $this->property->getBedrooms(); ?>
                      beds -
                      <?php echo $this->property->getBathrooms(); ?>
                      baths -
                      <?php echo $this->property->getSqft(); ?>
                      sqft
                    </h4>
                    <br>

                    Features:
                    <ul class="mrg-0 btm-mrg-10 clr-535353">
                      <li>
                        <?php echo $this->property->getLotSize(); ?>
                        SqFt lot
                      </li>
                      <li>
                        <?php echo $this->property->getParkingSpaces(); ?>
                        Parking Spaces
                      </li>
                      <li>
                        Built in
                        <?php echo $this->property->getYearBuilt(); ?>
                      </li>
                      <li>
                        A Walk score of
                        <?php echo $this->property->getWalkScore(); ?>
                      </li>
                    </ul>
                    <p class="hidden-xs">
                      <?php echo $this->property->getLongDescription(); ?>
                    </p>
                    <span class="fnt-smaller fnt-lighter fnt-arial"></span>
                    </div>
                  </div>
                </div><!-- End Listing-->



                <!-- <h1>Property Details</h1> -->
                <!-- <div class="row">
                    <div class="col-xs-1 col-md-1">
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items
                            <div class="carousel-inner">
                                <div class="active item">
                                    <?php
                                    echo '<img class="image1" src="' . $this->property->getThumbnailFileName() . '" >';
                                    ?>
                                    <!-- <img src="http://placehold.it/300x200/888&text=Item 1" />
                                </div>
                                <div class="item">
                                    <img src="http://placehold.it/800x400/999&text=Item 2" />
                                </div>
                                <div class="item">
                                    <img src="http://placehold.it/800x400/333&text=Item 3" />
                                </div>
                            </div>
                            <!-- Carousel nav
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                        <!-- LINKED NAV
                        <div style="text-align: center">
                            <ol class="carousel-linked-nav pagination">
                                <li class="active"><a href="#1">Pic1</a></li>
                                <li><a href="#2">Pic2</a></li>
                                <li><a href="#3">Pic3</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-xs-1 col-md-1">
                    </div>
                    <div class="col-xs-2 col-md-2">
                        <?php
                        // // echo "<p>".$this->index." </p>";
                        // echo "<p><strong>id: </strong>";
                        // echo $this->property->getID();
                        // echo "<br><strong>Description: </strong>";
                        // echo $this->property->getLongDescription();
                        // echo "<br><strong>Property Type: </strong>";
                        // echo $this->property->getPropertyTypeId();
                        // echo "<br><strong>Neighborhood: </strong>";
                        // echo $this->property->getNeighborhoodId();
                        // echo "<br><strong>Address: </strong>";
                        // echo $this->property->getAddress();
                        // echo "<br><strong>Unit: </strong>";
                        // echo $this->property->getAddressUnit();
                        // echo "</p>";
                        // //session_destroy();
                        ?>
                    </div>
                    <div class="col-xs-2 col-md-2">
                        <?php
                        // echo "<p><strong>Bedrooms: </strong>";
                        // echo $this->property->getBedrooms();
                        // echo "<br><strong>Bathrooms: </strong>";
                        // echo $this->property->getBathrooms();
                        // echo "<br><strong>Price: </strong>";
                        // echo $this->property->getPrice();
                        // echo "<br><strong>Sqft: </strong>";
                        // echo $this->property->getSqft();
                        // echo "<br><strong>Lot Size: </strong>";
                        // echo $this->property->getLotSize();
                        // echo "<br><strong>ParkingSpaces: </strong>";
                        // echo $this->property->getParkingSpaces();
                        // echo "<br><strong>Year Built: </strong>";
                        // echo $this->property->getYearBuilt();
                        // echo "<br><strong>Date Listed: </strong>";
                        // echo $this->property->getDateListed();
                        // echo "<br><strong>HOA Dues: </strong>";
                        // echo $this->property->getHoaDues();
                        // echo "<br><strong>MLS Number: </strong>";
                        // echo $this->property->getMlsNumber();
                        // echo "<br><strong>Walk Score: </strong>";
                        // echo $this->property->getWalkScore();
                        // echo "</p>";
                        ?>
                    </div>
                    <div class="col-xs-1 col-md-1">
                    </div>
                </div>
                <div> -->

                    <!-- <div class="col-xs-4 col-md-4">
                        <div class="col-xs-4 col-md-4">
                            <a href="#" class="thumbnail thumb">
                                <?php
                                // echo '<img class="image1" src="' . $this->property->getThumbnailFileName() . '" >';
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="navlink row col-xs-4 col-md-4">
                        <div class="col-md-3">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info btn1">Pic</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info btn2">Pic</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info btn3">Pic</button>
                        </div>
                        <div class="col-md-2" style="float:right">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>
                    </div> -->
                    <!-- <div class="map row col-xs-4 col-md-6">
                        <!-- Small modal
                        <button type="submit" class="btn btn-primary btn1" data-toggle="modal" data-target=".bs-example-modal-sm">Contact Realtor</button>

                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <h3>Please Login first</h3>
                            </div>
                          </div>
                        </div>
                    </div> -->





                    <script>
                    // invoke the carousel
                    $('#myCarousel').carousel({
                        interval: 0
                    });
                    /* SLIDE ON CLICK */
                    $('.carousel-linked-nav > li > a').click(function() {
                        // grab href, remove pound sign, convert to number
                        var item = Number($(this).attr('href').substring(1));
                        // slide to number -1 (account for zero indexing)
                        $('#myCarousel').carousel(item - 1);
                        // remove current active class
                        $('.carousel-linked-nav .active').removeClass('active');
                        // add active class to just clicked on item
                        $(this).parent().addClass('active');
                        // don't follow the link
                        return false;
                    });
                    /* AUTOPLAY NAV HIGHLIGHT */
                    // bind 'slid' function
                    $('#myCarousel').bind('slid', function() {
                        // remove active class
                        $('.carousel-linked-nav .active').removeClass('active');
                        // get index of currently active item
                        var idx = $('#myCarousel .item.active').index();
                        // select currently active item and add active class
                        $('.carousel-linked-nav li:eq(' + idx + ')').addClass('active');
                    });
                    </script>

                </div>
            </div>
            <!-- End Property Details -->
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/dropsearch.js" type="text/javascript"></script>
        <?php
        }
    }
}
?>
