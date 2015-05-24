<?php

//include 'Database.php';
//include 'DatabaseConnector.php';

/**
 * This class provides the implementation of interface Database and 
 * sets up the main skeleton for interacting with an actual Database system.
 * Also, this is a general object that can represent any ModelDatabase like UserDatabase,
 * ItemDatabase etc. 
 * Meaning that this object is able to interact with any appropriate Database
 * for a specific Model.   
 * As the type of the ModelDatabase will be defined by the instance type of the fields.
 * And the fields are responsible for performing the low level actions of the ModelDatabase.
 *    $dataAdder is responsible for adding data to the table in Database.
 *    $dataRemover is responsible for removing data from the table in Database.
 *    $dataEditor is responsible for editing data in the table in Database.
 *    $dataGetter is responsible for getting or extracting data from the table 
 *       in Database.
 *    $dataConnector is responsible for establishing connection to the Database.
 * So, the work is strikcly divided between different fields this class provides
 * high coheison and less coupling. 
 * And, this result in increasing extensibilty of this class along 
 * with the added security (As we can avoid possible vulnerabilities).
 * Example of use of this class:-
 *          $bookDatabase = new ModelDatabase(new BookAdder(),new BookRemover(),
 *                                          new BookEditor(), new BookGetter());
 *          $bookDatabase->add($_POST); // adds the data in global array to the Database
 *                                      // by indexing the fields of the table
 *                                      // in the POST array.
 *          ...
 *          $list = $bookDatabase->get(); //gets all the rows from the book table
 *                                        // in the Database.
 *          $list = $this->propertyDatabase->get();
 *          $num_results = $list->num_rows;
 *          echo "<p>Number of records found: ".$num_results."</p>";
 *          for ($i = 0; $i < $num_results; $i++)
 *          {
 *              $row = $list->fetch_assoc();
 *              echo "<p> <strong>Book Name:".$row['name']."</strong></p>";
 *              echo "<p> Author:".$row['author']."</p>".
 *              echo "<p> Description:".$row['description']."</p>";
 *              echo"<br/> <br/><br/>";
 *          }
 * 
 * 
 * 
 *  
 * @author sashi
 */
class ModelDatabase implements Database
{
    
    protected $dataAdder;
    protected $dataRemover;
    protected $dataEditor;
    protected $dataGetter;
    protected $databaseConnector;

    /**
     * Initializes all the fields of this ModelDatabase.
     * And the fileds are initialzed by the values passed in the parameter
     * along with the databaseConnector which is instantiated.
     * @param type $adder should be a DataAdder object 
     * @param type $remover should be a DataRemover object
     * @param type $editor should be a DataEditor object
     * @param type $getter should be a DataGetter object.
     */
    public function __construct($adder, $remover, $editor, $getter)
    {
        $this->dataAdder = $adder;
        $this->dataRemover = $remover;
        $this->dataEditor = $editor;
        $this->dataGetter = $getter;
        $this->databaseConnector = new DatabaseConnector(); 
    }
    
    
    /**
     * Adds the given to the Database of this Model.
     * @param type $data should be an associative array with the indexes
     * corelating to the fields of the table of this Model's Database.
     */
    public function add($data)
    {
        $db = $this->databaseConnector->connect();
        $this->dataAdder->add($data,$db);
        $db->close();
    }
    
    /**
     * Removes the given matching data from the Database of this Model.
     * @param type $data should be an unique or primary key of the data to be removed.
     */
    public function remove($data)
    {
        $db = $this->databaseConnector->connect();
        $this->dataRemover->remove($data,$db);
        $db->close();   
        
    }
    
    /**
     * @param type $data should be an associative array that contains a unique key or 
     * primary key of the data along with the field to be edited.
     */
    public function edit($data)
    {
        $db = $this->databaseConnector->connect(); 
        $this->dataEditor->edit($data,$db);
        $db->close();
    }
    
    /**
     * 
     * @return type is the resource that contains all the rows of the table of this
     * Model in the Database.
     */
    public function get()
    {
        $list=null;
        
        $db = $this->databaseConnector->connect();    
        $list = $this->dataGetter->get($db);
        
        $db->close();
        
        return $list;
        
    }
    
    /**
     * 
     * @param type $searchClause is the search Input to get related data.
     *         Like $searchClause = "zip = 94132"
     */
    public function getBySearch($searchClause)
    {
        $list=null;
        
        $db = $this->databaseConnector->connect();    
        $list = $this->dataGetter->getBySearch($searchClause,$db);
        
        $db->close();
        
        return $list;
    }
}
