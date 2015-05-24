<?php

//include_once 'ModelAction.php';

/**
 * This is an abstact class DataGetter that implements interface ModelAction.
 * So, this class is an abstraction for providing the functionality of
 * getting or extracting data from the Model's Database.
 * And any one interested in providing this functionlity for a Model should extend
 * this abstract class.
 * For example :-
 *                class BookGetter extends DataGetter
 *                {
 *                  
 *                  public function get( $db)
 *                  {
 *                      ...
 *                  }
 *                }
 *   
 *
 * @author sashi
 */
abstract class DataGetter implements ModelAction
{

    /**
     *  Name of the table where the query will be performed
     */
    protected $table;

    /**
     * Gets data from the database
     * And the return type is basically the resource that contains
     * all the data in the table of this ModelsDatabase. 
     */
    public abstract function get($db);

    /**
     * Gets data from the database based on logic of whereClause.
     * And the return type is basically the resource that contains
     * all the data in the table of this ModelsDatabase included
     * by the whereClause. 
     */
    public abstract function getBySearch($whereClause, $db);
}
