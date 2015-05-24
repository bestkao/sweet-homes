<?php

/**
 * PropertySearchConstraint holds a single constraint on a Property search
 * 
 * Expects an array of values that can be operated on with a single function:
 * anticipated operators are >=, <=, in, like, instr
 * 
 * e.g. id in 1,3,7    //allows multiple values
 * e.g. bedrooms >= 5  //can only have single value
 * e.g. description_long like "new"
 *
 * keyword search would need to use 'instr'
 * 
 * @author justina
 */
class PropertySearchConstraint
{

    public static $SINGULAR_VAL_OPS = array(
        '=' => '=',
        '>=' => '>=',
        '<=' => '<=',
        'instr' => 'instr'  //instring (aka contains)
    );
    public static $MULT_VAL_OPS = array(
        'in' => 'in'
    );
    public static $FREEFORM_OP = 'freeform';
    private $field;
    private $operator;
    private $values = array();

    public function __construct($field, $op, $val)
    {
        //for date-related searches, search criteria must be converted
        $val = self::dateSearchConversions($field, $val);
        $this->field = $field;
        $this->operator = $op;

        if (strlen($val) > 0) {
            //freeform entry may include comma delimited list, such as keywords
            if ($op == self::$FREEFORM_OP) {
                $this->values = explode(',', $val);
            } else {
                $this->values[0] = $val;
            }
        }
    }

    public function getField()
    {
        return $this->field;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function getValues()
    {
        return $this->values;
    }

    public function setField($field)
    {
        $this->field = $field;
    }

    public function setOperator($op)
    {
        $this->operator = $op;
    }

    public function setValues($vals)
    {
        $this->values = $vals;
    }

    public function sqlWhereClause()
    {
        $valCnt = 0;
        $whereClause = "";

        //keyword search - "instr" has distinct format
        if ($this->operator == 'instr') {
            $whereClause = $whereClause . $this->instrClause();

            //freeform search looks in several fields to find a match
        } else if ($this->operator == self::$FREEFORM_OP) {
            $whereClause = $whereClause . $this->freeformClause();

            //other searches
        } else {
            //process operators that accept multiple values as a list
            $multValOp = key_exists($this->operator, self::$MULT_VAL_OPS);
            if ($multValOp) {
                $whereClause = $whereClause . $this->multiValueOpClause();

                //process operators that only accept a single value
            } else {
                $whereClause = $whereClause . $this->singleValueOpClause();
            }
        }
        if (!empty($whereClause)) {
            $whereClause = "(" . $whereClause . ")";
        } else {
            $whereClause = "1";
        }

        return $whereClause;
    }

    private function instrClause()
    {
        return self::instrClauseWithVars($this->values, $this->field);
    }

    private static function instrClauseWithVars(array $valArray, $fld)
    {
        $whereClause = "";
        $valCnt = 0;
        //loop through values
        foreach ($valArray as $val) {
            if ($valCnt++ > 0) {
                $whereClause = $whereClause . " or ";
            }
            $whereClause = $whereClause . "instr(" . $fld . ",";
            $whereClause = $whereClause . "'" . $val . "') > 0";
        }

        return $whereClause;
    }

    private function multiValueOpClause()
    {
        return self::multiValueOpClauseWithVars(
                $this->values, 
                $this->field, 
                $this->operator
                );
    }
    
    private static function multiValueOpClauseWithVars(array $valArray, $fld, $op)
    {
        $whereClause = "";
        $valCnt = 0;
        //loop through values, making comma delimited list (note: can't use
        //implode due to need for quotes)
        foreach ($valArray as $val) {
            if ($valCnt++ > 0) {
                $whereClause = $whereClause . ",";
            }
            $whereClause = $whereClause . "'" . $val . "'";
        }
        if (!empty($whereClause)) {
            $whereClause = $fld . " " . $op . " (" . $whereClause . ")";   
        }

        return $whereClause;
    }

    private function singleValueOpClause()
    {
        return self::singleValueOpClauseWithVars (
                $this->values, 
                $this->field, 
                $this->operator
                );
    }
    
    private static function singleValueOpClauseWithVars(array $valArray, $fld, $op)
    {
        $whereClause = "";
        //loop through values, making field/op/val strings separated by "or"
        $valCnt = 0;
        foreach ($valArray as $val) {
            if ($valCnt++ > 0) {
                $whereClause = $whereClause . " or ";
            }
            $whereClause = $whereClause . $fld . " " . $op . " ";
            $whereClause = $whereClause . "'" . $val . "'";
        }

        return $whereClause;
    }

    //freeform data entry: multiple fields possible
    private function freeformClause()
    {
        $whereClause = "";
        $valCnt = 0;
        $fields = explode (",", $this->field);
        $prior = false;

        //loop through values for city (if it is one of fields to be searched)
        if (in_array("city", $fields)) {
            $whereClause = 
                    $whereClause . 
                    self::instrClauseWithVars ($this->values, "city");
            $prior = true;
        }

        //loop through values for neighborhood (if it is one of fields to be searched)
        if (in_array("neighborhood", $fields)) {
            if ($prior) {
                $whereClause = $whereClause . " or ";                
            }
            $whereClause = 
                    $whereClause . 
                    self::instrClauseWithVars ($this->values, "neighborhood");
            $prior = true;
        }

        //loop through values for zip (if it is one of fields to be searched)
        if (in_array("zip", $fields)) {
            if ($prior) {
                $whereClause = $whereClause . " or ";                
            }
            $whereClause = 
                    $whereClause . 
                    self::multiValueOpClauseWithVars (
                            $this->values, 
                            "zip", 
                            "in"
                            );
            $prior = true;
        }

        //loop through values for descriptionShort (if it is one of fields to be searched)
        if (in_array("descriptionShort", $fields)) {
            if ($prior) {
                $whereClause = $whereClause . " or ";                
            }
            $whereClause = 
                    $whereClause . 
                    self::instrClauseWithVars ($this->values, "descriptionShort");
            $prior = true;
        }

        //loop through values for descriptionLong (if it is one of fields to be searched)
        if (in_array("descriptionLong", $fields)) {
            if ($prior) {
                $whereClause = $whereClause . " or ";                
            }
            $whereClause = 
                    $whereClause . 
                    self::instrClauseWithVars ($this->values, "descriptionLong");
            $prior = true;
        }

        if (!empty($whereClause)) {
            $whereClause = "(" . $whereClause . ")";
        }

        return $whereClause;
    }

    private static function dateSearchConversions($searchFld, $search)
    {
        date_default_timezone_set('America/Los_Angeles');
        //convert search data to year built (from "age")
        if ($searchFld == "yearBuilt" && $search != "") {
            $search = date("Y") - (int) $search;
        }
        //convert search data to date listed (from days on market)
        if ($searchFld == "dateListed" && $search != "") {
            $search = date("Y-m-d",
                    mktime(0, 0, 0) - ((int) $search * 24 * 60 * 60));
        }

        return $search;
    }

}
