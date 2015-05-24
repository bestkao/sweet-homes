<?php


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
class PreferenceGetter
{
    private $limit=50;
    
    public function __construct($name)
    {
        $this->table = $name;
    }
    
    
    public function getBySearch($whereClause, $db)
    {
        // echo"city selector <br/>";
        $query = "select * from " . $this->table;
        $query = $query . " where " . $whereClause;
        $result = $db->query($query);
        
    
        
        $query = "select * from " . $this->table;
        $query = $query . " where " . $whereClause;
        $result = $db->query($query);

        return $result;
    }
    
    public function get($db)
    {        
        $query = "select * from " . $this->table." LIMIT 0".
                ",".$this->limit;
        $result = $db->query($query);

        // check that result was ok

        return $result;
    }
}
