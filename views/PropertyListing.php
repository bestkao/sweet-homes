<?php



/**
 * Description of PropertyListing
 *
 * @author sashi
 */
class PropertyListing
{
    private $limitPerPage, $currentPage;
    private $pagination;
    private $properties;
    private $whereClause;

    private $error_message;
    


    public function __construct($limit=5)
    {
       $this->limitPerPage=$limit;
       $this->pagination = new Pagination();
       $this->pagination->setLimit($this->limitPerPage);
       $this->currentPage=0;
       ?>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Buy</title>
            <link rel="icon" href="images/favicon.ico">

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.css" rel="stylesheet">


            <link href="css/PropertyListing.css" rel="stylesheet">

        </head>
     <?php
    }

    public function setWhereClause($clause)
    {
        $this->whereClause=$clause;
    }

    public function setErrorMessage($value)
    {
        $this->error_message=$value;
    }
    
    public function displayListing()
    {
        if (isset($_GET['index'])) {
           $this->pagination->setStartIndex($_GET['index']);
           $this->currentPage=$_GET['index'];
        }
        else $this->pagination->setStartIndex();
        $this->properties = Property::getBySearch($this->whereClause);
        //$this->whereClause="city= 'San Francisco'";
        if(!is_null($this->properties) && count($this->properties)>=1){
            $this->displayList();
        }
        else{
            echo '<div class="container" align="center">'.$this->error_message.'</div>';
        }
    }

    private function displayList()
    {
        $num_results = PropertyGetter::getTotalResults();
        if(isset($_GET['clause'])){
            $this->whereClause=$_GET['clause'];
        }
    ?>
        <div class="container-fluid" style="background-color:white">
            <div class="container container-pad" id="property-listings">


                <div class="row">
                    <!-- <div class="col-sm-6"> -->
                    <?php
                    $numPages = 0;

                    if ($this->limitPerPage > 0)
                        $numPages = ceil($num_results / $this->limitPerPage);

                    if ($num_results == 0) {
                        echo '<h3><p><strong>No properties matched your search request.</strong>'
                        . '</p> '
                        . '</h3>';
                    } else {
                        echo '<h3><p><strong>' . $num_results . ' results</strong>'
                        . ' (Page ' . ($this->currentPage + 1) . ' of ' . $numPages . ')</p> '
                        . '</h3>';
                    }
                    $properties = $this->properties;
                    $currentLimit = count($properties);

                    for ($i = 0; $i < $currentLimit; $i++) {
                        //if($i==$maxNumListing)break;
                        ?>


                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing"
                            >
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
                                                        class="btn btn-primary" role="button" target="_parent" >View Details</a>
                                                    <a href="#" class="btn btn-default" role="button">Contact Realtor</a></p>
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
                    <nav>
                        <ul class="pagination">
                            <li><a
                                <?php
                                if ($this->currentPage > 0) {
                                    echo 'href="propertyListing.php?index=' . ($this->currentPage - 1) . '"';
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
                                        <?php echo 'href="propertyListing.php?index=' . ($i) . '"';
                                        ?>
                                            > <?php echo ($i + 1) ?> <span class="sr-only">(current)</span></a></li>

                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <a
                                        <?php
                                        echo 'href="propertyListing.php?index=' . ($i)
                                        . '&search=' . $this->whereClause . '"';
                                        ?>
                                            > <?php echo($i + 1) ?> <span class="sr-only">(current)</span></a></li>

                                    <?php
                                }
                                if (($i - $this->currentPage) >= 7) {
                                    ?>
                                    <li>
                                        <a
                                        <?php
                                        echo 'href="propertyListing.php?index=' . ($i) .
                                        '&search=' . $this->whereClause . '"';
                                        ?>
                                            > <?php echo '...' ?> <span class="sr-only">(current)</span></a></li>


                                    <?php
                                }
                            }
                            ?>

                            <li><a
                                <?php
                                if ($this->currentPage + 1 < $numPages)
                                    echo 'href="propertyListing.php?index=' .
                                    ($this->currentPage + 1) . '"';
                                else
                                //echo 'href="propertyList.php?index=' . ($this->currentPage) . '"';

                                    ?>
                                    ><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>

                        </ul>
                    </nav>
                    <?php ?>

                </div>



            </div>
        </div>
     <?php
    }
}
