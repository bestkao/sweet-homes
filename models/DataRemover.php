<?php
//include_once 'ModelAction.php';
/**
 * This is an abstact class DataRemover that implements interface ModelAction.
 * So, this class is an abstraction for providing the functionality of
 * removing data from the Model's Database.
 * And any one interested in providing this functionlity for a Model should extend
 * this abstract class.
 * For example :-
 *                class BookRemover extends DataRemvoer
 *                {
 *                  
 *                  public function remove($data, $db)
 *                  {
 *                      ...
 *                  }
 *                }
 * 
 * @author sashi
 */
abstract class DataRemover implements ModelAction
{
    /**
     *  Name of the table where the query will be performed
     */
    protected $table;
    
    /**
     * $data should be an unique or primary key of the data to be removed.
     * $db must be the handle of the Database.
     */
    public abstract function remove($dataID,$db);
    
}

