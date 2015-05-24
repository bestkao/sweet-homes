<?php

/**
 * This is a class PropertyTypeGetter that extends the abstract class DataGetter.
 * This class handles the responsibility of getting or extracting data from the 
 * Database of a PropertyTypeModel.
 *  
 *  Example:-
 *           ...
 *           public function getPropertyType()
 *           {
 *              ...
 *              return ($this->userGetter->get()); 
 *           }
 * @author sashi
 */
class PropertyTypeGetter extends DataGetter
{
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    public function get($db)
    {

        $query = "select * from " . $this->table;
        $result = $db->query($query);

        // check that result was ok

        return $result;
    }

    public function getBySearch($whereClause, $db)
    {
        //echo"<p>get by search</p><br/>";
        $query = "select * from " . $this->table;
        $query = $query . " where " . $whereClause;
        
        $result = $db->query($query);
        //echo '<p>'.$query.'</p>';
        
        
        return $result;
    }

}
