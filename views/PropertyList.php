<?php

if (!isset($_SESSION)) {
    session_start();
}


/**
 * Description of PropertyList
 *
 * @author sashi,justina,daisy
 */
class PropertyList extends Page {

    private static $propertySearch;  //maintained as $_SESSION var
    private $currentPage;
    private $limit;
    
    public $to_id;
    public $message=array();
    public static $SRCHFLD_CLEAR = "clear";
    public static $SRCHFLD_FREEFORM_KEYWORD = "descriptionLong,descriptionShort/freeform";
    public static $SRCHFLD_FREEFORM_MAIN = "city,neighborhood,zip/freeform";

    public function __construct($page = 0) {
        parent::__construct();
        self::initPropertySearch();
        $this->currentPage = $page;
        ?>
        <!DOCTYPE html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Buy</title>
            <link rel="icon" href="images/favicon.ico">

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">


            <!-- Custom styles for this template -->
            <link href="css/Header.css" rel="stylesheet">
            <link href="css/PropertyList.css" rel="stylesheet">
            <link href="css/Footer.css" rel="stylesheet">
        </head>

        <?php
    }

    public static function getPropertySearch() {
        return self::$propertySearch;
    }

    public function setCurrentPage($page) {
        $this->currentPage = $page;
    }

    public function setLimit($lim) {
        $this->limit = $lim;
    }

    public static function setSearchAddConstraint($constraint) {
        self::$propertySearch->addConstraint($constraint);
    }

    public static function setSearchClear() {
        self::$propertySearch->clear();
    }

    public static function setSearchRemoveMostRecentConstraint() {
        self::$propertySearch->deleteMostRecent();
    }

    public static function setSearchRestoreMostRecentConstraint() {
        self::$propertySearch->restoreMostRecent();
    }

    //check for existence of property search, create if necessary
    private static function initPropertySearch() {
        //if search object not already set, check session variable
        if (is_null(self::$propertySearch)) {
            //echo 'initPropertySearch</br>';
            //load from session var if avail, o/w create new search object
            if (isset($_SESSION['currSearch']) && $_SESSION['currSearch'] != null) {
                //echo "Restoring search from session var</br>";
                self::$propertySearch = $_SESSION['currSearch'];
            } else {
                self::$propertySearch = new PropertySearch(null);
            }
        }
    }

    public function display() {
        $this->header->display();
        $this->displayHouseList();
        $this->footer->display();
    }

    public function displayHouseList() {
        $_SESSION['origin'] = "PropertyList";
        $_SESSION['currSearch'] = self::$propertySearch;

        //echo"<p>PropertyList: displayHouseList() entry </p>";
        $properties = null;
        $whereClause = self::$propertySearch->sqlWhereClause();
        $properties = Property::getBySearch($whereClause);

        $num_results = 0;

        if ($properties != null) {
            $num_results = PropertyGetter::getTotalResults();
        }

     
        //echo '<p>Num Results:' . $num_results . '</p>';
        //session_start();
        ?>




        <div class="jumbotron">
            <div class="container">





                <div class="tap">
                    <div class="container">

                        <!--                        <div class="row">
                        
                        
                        
                                                   <div class="col-xs-5 col-sm-4 col-md-3 col-lg-3 btn-group input-group-btn neitn">
                        
                        
                        
                        
                                                        <select class="btn btn-default dropdown-toggle dropButt" name="searchFld" id="field" form="dropform">
                                                            <option value="city/instr">City</option>
                                                            <option value="price/<=">Price (max)</option>
                                                            <option value="bedrooms/>=">Bedrooms (min)</option>
                                                            <option value="zip/=">Zip</option>
                                                        </select>
                        
                        
                        
                        
                        
                                                    </div>
                        
                        
                        
                                                </div>-->
                    </div>
                </div>








                <div class="searchbar1 simple-search" >


                    <form class="search" action="propertyList.php" method="get" >

                        <input class="form-control SearchBox" name="searchData"  
        <?php
        $val = isset($_SESSION['freeformMain']) ? $_SESSION['freeformMain'] : "";
        echo 'value="' . $val . '"';
        ?>
                               placeholder="Enter City, Neighborhood, Zip">

                        <input type="hidden" name="searchFld" value="<?php
        echo PropertyList::$SRCHFLD_FREEFORM_MAIN;
        ?>"> 

                        <button class="btn btn-primary ButtonSearch " type="submit">Search</button>

                    </form>


                </div>

                <div class="container2">
                    <div class="searchdropdownbar">
                        <ul class="nav nav-pills">

                            <li class ="dropdown1">
                                <a href="#" class = "dropdown-toggle1" data-toggle = "dropdown">
                                    <?php
                                        echo isset($_SESSION['priceHeader']) ? $_SESSION['priceHeader'] : "Price";?><b class = "caret"></b></a>
                                <ul class ="dropdown-menu">
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=">Any Price</a></li>
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=400000">$400,000 -</a></li>
                                    <li><a href="propertyList.php?searchFld=price/>=&searchData=400000">$400,000 +</a></li>
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=800000">$800,000 -</a></li>
                                    <li><a href="propertyList.php?searchFld=price/>=&searchData=800000">$800,000 +</a></li>
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=1000000">$1,000,000 -</a></li>
                                    <li><a href="propertyList.php?searchFld=price/>=&searchData=1000000">$1,000,000 +</a></li>
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=1500000">$1,500,000 -</a></li>
                                    <li><a href="propertyList.php?searchFld=price/>=&searchData=1500000">$1,500,000 +</a></li>
                                    <li><a href="propertyList.php?searchFld=price/<=&searchData=2000000">$2,000,000 -</a></li>
                                    <li><a href="propertyList.php?searchFld=price/>=&searchData=2000000">$2,000,000 +</a></li>
                                </ul>
                            </li>


                            <li class ="dropdown2">
                                <a href="#" class = "dropdown-toggle2" data-toggle = "dropdown">
                                    <?php
                                        echo isset($_SESSION['bedroomsHeader']) ? $_SESSION['bedroomsHeader'] : "# of Bedrooms";?><b class = "caret"></b></a>
                                <ul class ="dropdown-menu">
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=">All Bedrooms</a></li>
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=1">1+ Bedrooms</a></li>
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=2">2+ Bedrooms</a></li>
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=3">3+ Bedrooms</a></li>
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=4">4+ Bedrooms</a></li>
                                    <li><a href="propertyList.php?searchFld=bedrooms/>=&searchData=5">5+ Bedrooms</a></li>
                                </ul>

                            </li>

                            <li class ="dropdown3">
                                <a href="#" class = "dropdown-toggle3" data-toggle = "dropdown">
                                    <?php
                                        echo isset($_SESSION['propertyTypeHeader']) ? $_SESSION['propertyTypeHeader'] : "Property Type";?><b class = "caret"></b></a>
                                <ul class ="dropdown-menu">
                                    <li><a href="propertyList.php?searchFld=propertyTypeId/=&searchData=">All Property Types</a></li>
                                    <?php
                                        $propTypes = PropertyType::getAll();
                                        foreach ($propTypes as $type) {
                                    ?>
                                    <li><a href="propertyList.php?searchFld=propertyTypeId/=&searchData=<?php echo $type->getID();?>"><?php echo $type->getName();?></a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </li>

                            <li class ="dropdown4">

                                <a id="dLabel" role="button" data-toggle="dropdown" class="nav nav-pills" data-target="#" href="/page.html">
                                    More <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li class="dropdown-submenu submenu1">
                                        <a class="btn1" tabindex="-1" href="#">
                                    <?php
                                        echo isset($_SESSION['bathroomsHeader']) ? $_SESSION['bathroomsHeader'] : "# of Bathrooms";
                                    ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="propertyList.php?searchFld=bathrooms/>=&searchData=">All Bathrooms</a></li>
                                            <li><a href="propertyList.php?searchFld=bathrooms/>=&searchData=1">1+ Bathrooms</a></li>
                                            <li><a href="propertyList.php?searchFld=bathrooms/>=&searchData=2">2+ Bathrooms</a></li>
                                            <li><a href="propertyList.php?searchFld=bathrooms/>=&searchData=3">3+ Bathrooms</a></li>
                                            <li><a href="propertyList.php?searchFld=bathrooms/>=&searchData=4">4+ Bathrooms</a></li>
                                            <li><a href="propertyList.php?searchFld=bathrooms/>=&searchData=5">5+ Bathrooms</a></li>
                                        </ul>
                                    <li class="dropdown-submenu submenu2">
                                        <a class="btn2" tabindex="-1" href="#">
                                            <?php
                                            echo isset($_SESSION['sqftHeader']) ? $_SESSION['sqftHeader'] : "Square Feet";
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="propertyList.php?searchFld=sqft/>=&searchData=">Any Square Footage</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=250">250+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=750">750+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=1000">1,000+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=1500">1,500+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=2000">2,000+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=3000">3,000+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=4000">4,000+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=5000">5,000+ sqft</a></li>
                                            <li><a href="propertyList.php?searchFld=sqft/>=&searchData=10000">10,000+ sqft</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu submenu3">
                                        <a class="btn3" tabindex="-1" href="#">
                                            <?php
                                            echo isset($_SESSION['statusHeader']) ? $_SESSION['statusHeader'] : "Status";
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="propertyList.php?searchFld=status/=&searchData=">All Properties</a></li>
                                            <li><a href="propertyList.php?searchFld=status/=&searchData=listed">For Sale</a></li>
                                            <li><a href="propertyList.php?searchFld=status/=&searchData=sold">Sold</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu submenu4">
                                        <a class="btn4" tabindex="-1" href="#">
                                            <?php
                                            echo isset($_SESSION['ageHeader']) ? $_SESSION['ageHeader'] : "Age of Property";
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="propertyList.php?searchFld=yearBuilt/>=&searchData=">Any Age</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/>=&searchData=1">0-1 Years</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/>=&searchData=5">0-5 Years</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/>=&searchData=10">0-10 Years</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/>=&searchData=20">0-20 Years</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/>=&searchData=50">0-50 Years</a></li>
                                            <li><a href="propertyList.php?searchFld=yearBuilt/<=&searchData=50">50+ Years</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu submenu5">
                                        <a class="btn5" tabindex="-1" href="#">
                                            <?php
                                            echo isset($_SESSION['domHeader']) ? $_SESSION['domHeader'] : "# Days on Market";
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="propertyList.php?searchFld=dateListed/>=&searchData=">Any # of Days</a></li>
                                            <li><a href="propertyList.php?searchFld=dateListed/>=&searchData=25">0-25 Days</a></li>
                                            <li><a href="propertyList.php?searchFld=dateListed/>=&searchData=50">0-50 Days</a></li>
                                            <li><a href="propertyList.php?searchFld=dateListed/>=&searchData=75">0-75 Days</a></li>
                                            <li><a href="propertyList.php?searchFld=dateListed/>=&searchData=100">0-100 Days</a></li>
                                            <li><a href="propertyList.php?searchFld=dateListed/<=&searchData=100">100+ Days</a></li>
                                        </ul>
                                    </li>

                                    <li role="presentation" class="divider"></li>

                                    <li>                    
                                        <form class="search" action="propertyList.php" method="get" id="dropform">
                                            <input class="form-control SearchBox" name="searchData"

                                                <?php
                                                $val = isset($_SESSION['freeformKeyword']) ? $_SESSION['freeformKeyword'] : "";
                                                echo 'value="' . $val . '"';
                                                ?>

                                                   placeholder="Search by Keyword">
                                            <input type="hidden" name="searchFld" value="<?php
                                                echo PropertyList::$SRCHFLD_FREEFORM_KEYWORD;
                                                ?>">
                                            <button class="btn btn-primary ButtonSearch " type="submit">Search</button>
                                        </form> 
                                    </li>
                                </ul>
                            </li>


                        </ul>

                    </div>
                </div>
                <div class="buttons">
                    <a class="btn btn-primary" href="propertyList.php?searchFld=<?php
        echo PropertyList::$SRCHFLD_CLEAR;
        ?>" role="button">Clear Search</a>
                </div>

            </div>
        </div>
        
        <?php 
        if(isset($this->message['sent'])){
            echo ' <br/><br/><br/><br/><br/><br/><br/><br/><br/>';
            echo'    <div class="container" style="background-color: #28a4c9;">     
        <h3 style="text-align: center;">';
         echo $this->message['sent'];
        echo'</h3></div> '; 
        ?>     
        <?php
        }
        else if(isset($_GET['to']) || strlen($this->to_id)>=1){
        echo ' <br/><br/><br/><br/><br/><br/><br/><br/><br/>';
          $this->contactRealtorForm();
        }
        else{
            echo'<br/><br/><br/><br/><br/><br/><br/><br/>';
        }
        
        ?>

        <br/><br/><br/><br/><br/><br/><br/><br/>

        <div class="title" align="center">
            <p><b>List of Properties Returned From Search</b></p>
        </div>

        
        <div class="container-fluid" style="background-color:white">
            <div class="container container-pad" id="property-listings">


                <div class="row">
                    <!-- <div class="col-sm-6"> -->
                    <?php
                    $numPages = 0;

                    if ($this->limit > 0)
                        $numPages = ceil($num_results / $this->limit);

                    if ($num_results == 0) {
                        echo '<h3><p><strong>No properties matched your search request.</strong>'
                        . '</p> '
                        . '</h3>';
                    } else {
                        if($numPages==0)$numPages=1;
                        echo '<h3><p><strong>' . $num_results . ' results</strong>'
                        . ' (Page ' . ($this->currentPage + 1) . ' of ' . $numPages . ')</p> '
                        . '</h3>';
                    }

                    $currentLimit = count($properties);?>
                                        <nav>
                        <ul class="pagination">
                            <li><a
                                <?php
                                if ($this->currentPage > 0) {
                                    echo 'href="propertyList.php?index=' . ($this->currentPage - 1) . '"';
                                } else {
                                    //echo 'href="propertyList.php?index=' . $this->currentPage . '"';
                                }
                                ?>
                                    ><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
                                <?php
                                //  $numPages = 0;
                                // if ($this->limit > 0)
                                //   $numPages = ceil($num_results / $this->limit);

                                for ($i = $this->currentPage; $i < $numPages; $i++) {
                                    ?>
                                    <?php if (($i) == $this->currentPage) { ?>

                                    <li class="active"><a 
                                        <?php echo 'href="propertyList.php?index=' . ($i) . '"';
                                        ?>
                                            > <?php echo ($i + 1) ?> <span class="sr-only">(current)</span></a></li>

                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <a    
                                        <?php
                                        echo 'href="propertyList.php?index=' . ($i)
                                        . '&search=' . $whereClause . '"';
                                        ?>
                                            > <?php echo($i + 1) ?> <span class="sr-only">(current)</span></a></li>

                <?php
            }
            if (($i - $this->currentPage) >= 7) {
                ?>
                                    <li>
                                        <a    
                <?php
                echo 'href="propertyList.php?index=' . ($i) .
                '&search=' . $whereClause . '"';
                ?>
                                            > <?php echo '...' ?> <span class="sr-only">(current)</span></a></li>


                                        <?php
                                    }
                                }
                                ?>

                            <li><a
                    <?php
                    if ($this->currentPage + 1 < $numPages)
                        echo 'href="propertyList.php?index=' .
                        ($this->currentPage + 1) . '"';
                    else
                    //echo 'href="propertyList.php?index=' . ($this->currentPage) . '"';
                        
                        ?>
                                    ><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>

                        </ul>
                    </nav>
<?php
                    for ($i = 0; $i < $currentLimit; $i++) {
                        //if($i==$maxNumListing)break;
                        ?>


                    
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                            <div class="media">

                                <a class="pull-left"
            <?php
            echo 'href="propertyDetails.php?pid=' . $properties[$i]->getID() . '"';
            ?>
                                   target="_parent">
                                    <img alt="image"  class="img-responsive"  <?php echo'src="' . $properties[$i]->getThumbnailFileName() . '"'; ?> width="720" height="520">
                                </a>


                                <div class="clearfix visible-sm"></div>
                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h4 class="media-heading">
                                        <a
                                            <?php
                                            echo 'href="http://maps.google.com/?q='
                                            .$properties[$i]->getAddress().','.$properties[$i]->getCity().','.
                                                    $properties[$i]->getState().'"';
                                            ?>
                                            target="_parent"/>

                                            <?php
                                            echo $properties[$i]->getAddress();
                                            echo ', ';
                                            echo $properties[$i]->getCity();
                                            ?>

    

                                            <small class="pull-right">
                                                <p><a 
                                        <?php
                                        echo 'href="propertyDetails.php?pid=' . $properties[$i]->getID() . '"';
                                        ?>
                                                        class="btn btn-primary" role="button">View Details</a> 
                                                    <a 
                                                       <?php 
                                                       echo 'href="propertyList.php?to='.$properties[$i]->getID().'"';
                                                       ?>
                                                        
                                                        class="btn btn-default" role="button">Contact Realtor</a></p>
                                            </small>
                                        </a></h4>


                                    <p>
            <?php
            echo '$' . $properties[$i]->getPriceFormatted();
            ?>
                                    </p>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">

                                        <li>
            <?php echo $properties[$i]->getBedrooms(); ?>
                                            Beds,</li>
                                        <li>
            <?php echo $properties[$i]->getBathrooms(); ?>
                                            Baths,</li>
                                        <li>
                                        <?php echo $properties[$i]->getSqft(); ?>
                                            SqFt</li>
                                        <li><b>
            <?php echo $properties[$i]->getStatus(); ?>
                                            </b>
                                        </li>

                                    </ul>


                                    <p class="hidden-xs">
            <?php echo $properties[$i]->getShortDescription(); ?>
                                    </p>
                                    <span class="fnt-smaller fnt-lighter fnt-arial"></span>

                                </div>

                            </div>
                        </div><!-- End Listing-->
                                    <?php
                                }
                                ?>
   

                </div>



            </div>
        </div>
         
        <br/><br/><br/><br/>

       
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <!-- Causes button to update when clicked -->
        <!--        <script src="js/dropsearch.js" type="text/javascript"></script>-->
        <script src="js/textsearch.js"></script>
        <script src="js/dropselect.js"></script>
        <script>
            $(document).ready(function () {
                //console.log('in ready function');
                //on-click functionality for list anchors...  (i.e. selected search criteria)
                $("a").click(function () {
                    /*
                     var searchOp = "";
                     var searchVal = "";
                     if ($(this).attr("id")) {
                     //alert('in click function, id=' + $(this).attr("id"));
                     if ($(this).attr("id").substring(0, 5) == "price") {
                     searchOp = "price/>=";
                     searchVal = $(this).attr("id").substring(5);
                     } else if ($(this).attr("id").substring(0, 8) == "proptype") {
                     searchOp = "propertyTypeId/=";
                     searchVal = $(this).attr("id").substring(8);
                     } else if ($(this).attr("id").substring(0, 3) == "bed") {
                     searchOp = "bedrooms/>=";
                     searchVal = $(this).attr("id").substring(3);
                     } else if ($(this).attr("id").substring(0, 4) == "bath") {
                     searchOp = "bathrooms/>=";
                     searchVal = $(this).attr("id").substring(4);
                     } else if ($(this).attr("id").substring(0, 4) == "sqft") {
                     searchOp = "sqft/>=";
                     searchVal = $(this).attr("id").substring(4);
                     } else if ($(this).attr("id").substring(0, 4) == "year") {
                     var op = $(this).attr("id").substring(4, 5);
                     //determine operator; note, the operator is counter-intuitive
                     //because translating age < aa to year > yyyy (or vice versa)
                     if (op == ">") {
                     searchOp = "yearBuilt/>=";
                     } else {
                     searchOp = "yearBuilt/<=";
                     }
                     //calculate year to check against
                     if ($(this).attr("id").substring(5).length > 0) {
                     var d = new Date();
                     var y = d.getFullYear() - parseInt($(this).attr("id").substring(5));
                     searchVal = y + "";
                     }
                     //alert(searchOp + searchVal);
                     } else if ($(this).attr("id").substring(0, 6) == "status") {
                     searchOp = "status/=";
                     searchVal = $(this).attr("id").substring(6);
                     //alert(searchOp + " " + searchVal);
                     } else if ($(this).attr("id").substring(0, 3) == "dom") {
                     var op = $(this).attr("id").substring(3, 4);
                     //determine operator; note, the operator is counter-intuitive
                     //because translating days on market < dd to date > yyyy-mm-dd (or vice versa)
                     if (op == ">") {
                     searchOp = "dateListed/>=";
                     } else {
                     searchOp = "dateListed/<=";
                     }
                     //calculate date boundary
                     if ($(this).attr("id").substring(4).length > 0) {
                     var d = new Date();
                     //subtract user-requested DOM (days on market) value
                     d.setDate(d.getDate() - parseInt($(this).attr("id").substring(4)));
                     //convert date to string, format yyyy-mm-dd
                     var currDay = "0" + d.getDay().toString();
                     var currMonthInt = d.getMonth() + 1; //Months are zero based
                     var currMonth = "0" + currMonthInt.toString();
                     var currYear = d.getFullYear().toString();
                     searchVal = currYear + "-" +
                     currMonth.substring(currMonth.length - 2, currMonth.length) + "-" +
                     currDay.substr(currDay.length - 2, currDay.length);
                     }
                     }
                     //alert('in click function; after if');
                     
                     //post search data
                     if (searchOp.length > 0) {
                     //console.log('before post stmt');
                     $.post('propertyList.php',
                     {
                     searchFld: searchOp,
                     searchData: searchVal
                     },
                     function (data) {
                     console.log('post completed: search=' + searchOp + ' ' + searchVal);
                     });
                     }
                     }
                     */
                });
            });
        </script>

        <?php
    }
    
    public function contactRealtorForm() 
    {
        $property= Property::find($this->to_id);
        
    ?>
        <div class="container" style="background-color: darkseagreen;
             width: 50%;">  
<form class="form-horizontal" 
      <?php
      echo 'action="contact.php?to='.$this->to_id.'"';
      ?>
     method="post">
          <fieldset>
             <?php       
        ?>
            <legend class="text-center">Contact Agent To Get More Info</legend>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Your Name</label>
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
                  <textarea style="resize: none;" class="form-control" id="message" name="message" 
                  
                      rows="5"><?php
                            echo 'I am interested in '.$property->getAddress().
                                    ','.$property->getCity().','.$property->getZip().'';
                            ?>               
                  </textarea>
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
    <?php    
    }

}
