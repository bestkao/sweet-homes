<?php

/**
 * This is a class ContactAdder that extends the abstract class DataAdder.
 * This class handles the responsibility of adding data to the 
 * Database of a ContactModel.
 *  
 *  Example:-
 *           ...
 *           public function addContact($data)
 *           {
 *              ...
 *              $this->contactAdder->add($data, $database); 
 *           }
 */
class ContactAdder extends DataAdder
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
        
        $query = ContactAdder::buildSQLInsert($this->table, $data);
       // echo "in ContactAdder::add, query = ".$query."</br>";
        $result = $db->query($query);

        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table."(s) added to database.";
             //echo "<br/> query =".$query."<br/>";
        } 
        else 
        {
  	 //   echo "An error has occurred.  The item was not added.";
           // echo "<br/> query =".$query."<br/>";
        }
        //data should be an 
        foreach ($data as $key => $value) 
        {
            //echo "\$a[$key] => $value.\n";
            
        }
        
    }

}
