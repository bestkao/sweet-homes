<?php

require_once("SweetHomeAutoloader.php");

//need session to pass the search constraint object for pagination
if(!isset($_SESSION)) { 
    session_start(); 
} 
//echo 'in propertyList</br>';

$FLD_OP_DELIM = "/";
$limitPerPage = 5;

if (isset($_GET['searchFld'])) {
    $searchFld = $_GET['searchFld'];
    $searchFld = InputFilter::filter($searchFld);
    //echo 'in propertyList: searchFld = ' . $searchFld . '</br>';
}

//if user is coming from 'Home' page (or unknown origin) or has pressed 
//"clear search" button; unset session var storing search data
if (
        (
        !isset($_SESSION['origin']) || 
        $_SESSION['origin'] == "Home"
        ) ||
        (
        isset($searchFld) && 
        $searchFld == PropertyList::$SRCHFLD_CLEAR
        )
    ) {
    //echo 'in propertyList: clear search</br>';
    
    //if current search information is stored, unset it
    if (isset($_SESSION['currSearch'])) {
        unset($_SESSION['currSearch']);
    }
    //if var containing freeform (main) search text exists, unset it
    if (isset($_SESSION['freeformMain'])) {
        unset($_SESSION['freeformMain']);
    }
    //if var containing freeform (keyword) search text exists, unset it
    if (isset($_SESSION['freeformKeyword'])) {
        unset($_SESSION['freeformKeyword']);
    }
    if (isset($_SESSION['priceHeader'])) {
        unset($_SESSION['priceHeader']);
    }
    if (isset($_SESSION['bedroomsHeader'])) {
        unset($_SESSION['bedroomsHeader']);
    }
    if (isset($_SESSION['bathroomsHeader'])) {
        unset($_SESSION['bathroomsHeader']);
    }
    if (isset($_SESSION['propertyTypeHeader'])) {
        unset($_SESSION['propertyTypeHeader']);
    }
    if (isset($_SESSION['sqftHeader'])) {
        unset($_SESSION['sqftHeader']);
    }
    if (isset($_SESSION['statusHeader'])) {
        unset($_SESSION['statusHeader']);
    }
    if (isset($_SESSION['ageHeader'])) {
        unset($_SESSION['ageHeader']);
    }
    if (isset($_SESSION['domHeader'])) {
        unset($_SESSION['domHeader']);
    }
}

//Create a new property list page with current search.  NOTE: SESSION var 
//'currSearch' maintains existing search information. See PropertyList::initPropertySearch()
$propertyListPage = new PropertyList();

if (isset($_GET['searchData'])) {
    $search = $_GET['searchData'];
    $search = InputFilter::filter($search);
    //echo 'in propertyList: search = ' . $search . '</br>';
}

//if new search request was found, process
if (isset($searchFld) && isset($search) && is_string($search)) {
    //need to retain and display user's search selections, including freeform
    //text in main and keywords
    if ($searchFld == PropertyList::$SRCHFLD_FREEFORM_MAIN) {
        $_SESSION['freeformMain'] = $search;
    } elseif ($searchFld == PropertyList::$SRCHFLD_FREEFORM_KEYWORD) {
        $_SESSION['freeformKeyword'] = $search;
    }
    
    //parse search field for field name and operator
    $opDelim = strpos($searchFld, $FLD_OP_DELIM);
    $operator = substr($searchFld, $opDelim + 1);
    if ($opDelim) {
        $searchFld = substr($searchFld, 0, strpos($searchFld, $FLD_OP_DELIM));
    } else {
        $searchFld = "";
    }
    //echo "search field = ".$searchFld.", operator = ".$operator."</br>";

    if ($searchFld === 'price') {
        if (empty($search)) {
            unset($_SESSION['priceHeader']);
        } else {
            $_SESSION['priceHeader'] = ($operator == "<=") ?
            '$' . number_format($search) . ' -' :
            '$' . number_format($search) . '  +';
        }
    } elseif ($searchFld === 'bedrooms') {
        if (empty($search)) {
            unset($_SESSION['bedroomsHeader']);
        } else {
            $_SESSION['bedroomsHeader'] = $search . "+ Bedrooms";
        }
    } elseif ($searchFld === 'bathrooms') {
        if (empty($search)) {
            unset($_SESSION['bathroomsHeader']);
        } else {
            $_SESSION['bathroomsHeader'] = $search . "+ Bathrooms";
        }
    } elseif ($searchFld === 'propertyTypeId') {
        if (empty($search)) {
            unset($_SESSION['propertyTypeHeader']);
        } else {
            $_SESSION['propertyTypeHeader'] = PropertyType::find($search)->getName();
        }
    } elseif ($searchFld === 'sqft') {
        if (empty($search)) {
            unset($_SESSION['sqftHeader']);
        } else {
            $_SESSION['sqftHeader'] = $search . "+ sqft";
        }
    } elseif ($searchFld === 'status') {
        if (empty($search)) {
            unset($_SESSION['statusHeader']);
        } else {
            $_SESSION['statusHeader'] = ($search == "sold") ? "Sold" : "For Sale";
        }
    } elseif ($searchFld === 'yearBuilt') {
        if (empty($search)) {
            unset($_SESSION['ageHeader']);
        } else {
            $_SESSION['ageHeader'] =  
                    ($operator = "<=") ? 
                    "0-". $search . " Years Old" : 
                    $search . "+ Years Old";
        }
    } elseif ($searchFld === 'dateListed') {
        if (empty($search)) {
            unset($_SESSION['domHeader']);
        } else {
            $_SESSION['domHeader'] =  
                    ($operator = "<=") ? 
                    "0-". $search . " Days" : 
                    $search . "+ Days";
        }
    }
    
    //create new search constraint
    $constraint = new PropertySearchConstraint($searchFld, $operator,
                  $search);
    $_SESSION['constraint'] = $constraint;
    $propertyListPage->setSearchAddConstraint($constraint);
    //echo "where clause = " . $constraint->sqlWhereClause() . "</br>";
}

if(isset($_GET['to'])){
   $propertyListPage->to_id=  InputFilter::filter($_GET['to']);
}

//manage paging
$pagination = new Pagination();
$pagination->setLimit($limitPerPage);
$propertyListPage->setLimit($limitPerPage);

if (isset($_GET['index'])) {
    $pagination->setStartIndex($_GET['index']);
    $propertyListPage->setCurrentPage($_GET['index']);
} else
    $pagination->setStartIndex();

$propertyListPage->display();
