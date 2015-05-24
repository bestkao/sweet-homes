<?php


/**
 * This is a class PreferenceAdder that extends the abstract class DataAdder.
 * This class handles the responsibility of adding data to the Database of a 
 * PropertyPreference Model.
 *  
 *  Example:-
 *           ...
 *           public function addPropertyPreference($data)
 *           {
 *              ...
 *              $this->preferenceAdder->add($data, $database); 
 *           }
 *           ...
 *          
 * @author sashi
 */
class PreferenceAdder extends DataAdder
{
    
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    public function add($data, $db)
    {
        $query = PreferenceAdder::buildSQLInsert($this->table, $data);
       // echo "in UserAdder::add, query = ".$query."</br>";
        $result = $db->query($query);

        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table."(s) added to database.";
        } 
        else 
        {
  	   echo "An error has occurred.  The item was not added.";
          echo "<br/> query =".$query."<br/>";
        }
        //data should be an 
        /*foreach ($data as $key => $value) 
        {
            echo "\$a[$key] => $value.\n";
            
        }*/
        
    }

}
