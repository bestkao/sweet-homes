<?php

//include_once 'DataRemover.php';

/**
 * This is a class PropertyRemover that extends the abstract class DataRemover.
 * This class handles the responsibility of removing data from the 
 * Database of a PropertyModel.
 *  
 *  Example:-
 *           ...
 *           public function removeProperty($data)
 *           {
 *              ...
 *              $this->propertyRemover->remove($data, $database); 
 *           }
 *           ...
 * @author sashi
 */
final class PropertyRemover extends DataRemover
{
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    public function remove($dataID, $db) 
    {
        $result = null;
        if ($dataID != null)
        {
            $query = "delete from " . $this->table;
            $query = $query . " where id='" . $dataID . "'";
            $result = $db->query($query);
        }

        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table." removed from database.";
        } 
        else 
        {
  	   echo "An error has occurred.  The item was not removed.";
           echo "<br/> query =".$query."<br/>";
        }
    }
}
