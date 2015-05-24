<?php

/**
 * This is a class PropertyTypeRemover that extends the abstract class DataRemover.
 * This class handles the responsibility of removing data from the 
 * Database of a PropertyTypeModel.
 *  
 *  Example:-
 *           ...
 *           public function removePropertyType($uniqueID)
 *           {
 *              ...
 *              $this->userRemover->remove($uniqueID, $database); 
 *           }
 * @author sashi
 */
class PropertyTypeRemover extends DataRemover
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
            $query = $query . " where id=" . $dataID;
            $result = $db->query($query);
        }

        if ($result) 
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
