<?php


/**
 * This is a class DatabaseConnector responsible for establishing connection 
 * wih a Database system.
 * And this class specifically connects to a mysql database. 
 * So, this class can be extended to connect to any other database system.
 * 
 * Example of use:-
 *          $databaseConnector = new DatabaseConnector();
 *          // using default connection
 *          $db  = $databaseConnector->connect();
 *          $query = ...  // some query to be performed 
 *          $db->query($query);
 *          $db->close();
 *          
 *
 * @author sashi
 */
class DatabaseConnector 
{
    private $hostName,$nameOfDataBase, $user, $password ;
    
    public function __construct()
    {
        $this->hostName = "sfsuswe.com";
        $this->nameOfDataBase="student_f14g01";
        $this->user = "f14g01";
        $this->password = "secret1";
        
    }
    
    /**
     * Connects the Database.
     * @return the handle of the Database if successful or else false.
     */
    public function connect()
    {
        $db = new mysqli($this->hostName, $this->user, $this->password, $this->nameOfDataBase);
        
        if (!$db || mysqli_connect_errno()) 
        {
            echo "Error: Could not connect to database.  Please try again later.";
            $db = false;
        
        }
        return $db;
    }
    
    public function setHostName($hName)
    {
        $this->hostName = $hName;
    }
    
    public function setNameOfDatabase($dbName)
    {
        $this->nameOfDataBase = $dbName;
    }
        
    public function setUserName($userName)
    {
        $this->user=$userName;
    }
    
    public function setPassword($pwd)
    {
        $this->password = $pwd; 
    }
}

