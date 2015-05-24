<?php

/**
 * This is a class ContactEditor that extends the abstract class DataEditor.
 * This class handles the responsibility of editing existing data in the 
 * Database of a ContactModel.
 *  
 *  Example:-
 *           ...
 *           public function editContact($data)
 *           {
 *              ...
 *              $this->contactEditor->edit($data, $database); 
 *           }
 */
class ContactEditor extends DataEditor
{
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    public function edit($data, $db)
    {
        $query = ContactEditor::buildSQLUpdate($this->table, $data);
        $result = $db->query($query);

        echo "</br>".$query."</br>";
        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table." updated in database.";
        } 
        else 
        {
  	   echo "An error has occurred.  The item was not updated.";
           echo "<br/> query =".$query."<br/>";
        }
        //data should be an 
        foreach ($data as $key => $value) 
        {
            echo "\$a[$key] => $value.\n";
            
        }
    }
        
}
