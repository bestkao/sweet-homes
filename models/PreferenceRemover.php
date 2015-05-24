<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreferenceRemover
 *
 * @author sashi
 */
class PreferenceRemover
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
