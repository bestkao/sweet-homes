<?php

/**
 * This is a class UserAdder that extends the abstract class DataAdder.
 * This class handles the responsibility of adding data to the 
 * Database of a UserModel.
 *  
 *  Example:-
 *           ...
 *           public function addUser($data)
 *           {
 *              ...
 *              $this->userAdder->add($data, $database); 
 *           }
 * @author sashi
 */
class UserAdder extends DataAdder
{
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    public function add($data, $db) 
    {
        /*
         * //call function DataAdder->buildSQLInsert with
         * //$this->table, $fields, $data; returns query string
         *
         */
        
        $query = UserAdder::buildSQLInsert($this->table, $data);
       // echo "in UserAdder::add, query = ".$query."</br>";
        $result = $db->query($query);

        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table."(s) added to database.";
        } 
        else 
        {
  	  // echo "An error has occurred.  The item was not added.";
           //echo "<br/> query =".$query."<br/>";
        }
        //data should be an 
        /*foreach ($data as $key => $value) 
        {
            echo "\$a[$key] => $value.\n";
            
        }*/
        
    }

}
