<?php

//include_once 'DataGetter.php';

/**
 * This is a class PropertyGetter that extends the abstract class DataGetter.
 * This class handles the responsibility of getting or extracting data from the 
 * Database of a PropertyModel.
 *  
 *  Example:-
 *           ...
 *           public function getProperty()
 *           {
 *              ...
 *              return ($this->propertyGetter->get($database)); 
 *              
 *           }
 *           ...
 * @author sashi
 */
final class PropertyGetter extends DataGetter
{

    //private $tableName ="Property";
    private static $startIndex=0;
    private static $limit=5;
    private static $totalResults;
            
    public function __construct($name)
    {
        $this->table = $name;
    }
    
    public static function setStartIndex($index)
    {
        self::$startIndex = $index;
    }
    
    public static function setLimit($lim)
    {
        self::$limit=$lim;
    }
    

    public function get($db)
    {

        $query = "select * from " . $this->table;
        $result = $db->query($query);
        
        if(!is_null($result)) $this->totalResults= $result->num_rows;
        
        $query = "select * from " . $this->table." LIMIT ".$this->startIndex.
                ",".$this->limit;
        $result = $db->query($query);

        // check that result was ok

        return $result;
    }

    public function getBySearch($whereClause, $db)
    {
        // echo"city selector <br/>";
        $query = "select * from " . $this->table;
        $query = $query . " where " . $whereClause;
        $result = $db->query($query);
        
        if($result!=false) self::$totalResults= $result->num_rows;
        
        $query = "select * from " . $this->table;
        $query = $query . " where " . $whereClause." LIMIT ".self::$startIndex.
            ",".self::$limit;
        $result = $db->query($query);

        return $result;
    }
    
    public static function getTotalResults()
    {
        return self::$totalResults;
    }
}

