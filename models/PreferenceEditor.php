<?php



/**
 * This is a class PropertyEditor that extends the abstract class DataEditor.
 * This class handles the responsibility of editing data in the Database of a 
 * PropertyModel.
 *  
 *  Example:-
 *           ...
 *           public function editProperty($data)
 *           {
 *              ...
 *              $this->propertyEditor->edit($data, $database); 
 *           }
 *           ...
 * @author sashi
 */
class PreferenceEditor extends DataEditor
{
    public function __construct($name)
    {
        $this->table= $name;
    }
    
    
    public function edit($data, $db) 
    {
        $query = PreferenceEditor::buildSQLUpdate($this->table, $data);
        
        $result = $db->query($query);

        echo mysql_error();
        
        echo "</br>".$query."</br>";
        if ($result && $db->affected_rows > 0) 
        {
            echo  $db->affected_rows." ".$this->table." updated in database.";
        } 
        else 
        {
  	   echo "An error has occurred.  The item was not updated.\n";
           echo "<br/> query =".$query."<br/>";
           echo $result;
           //echo mysql_error($db). "\n";
           
        }
        //data should be an 
        foreach ($data as $key => $value) 
        {
            echo "\$a[$key] => $value.\n";
            
        }    
        
    }

}
