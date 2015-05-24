<?php

//include_once 'ModelAction.php';
/**
 * This is an abstact class DataEditor that implements interface ModelAction.
 * So, this class is an abstraction for providing the functionality of
 * editing data from Model's Database.
 * And any one interested in providing this functionlity for a Model should extend
 * this abstract class.
 * For example :-
 *                class BookEditor extends DataEditor
 *                {
 *                  
 *                  public function edit($data, $db)
 *                  {
 *                      ...
 *                  }
 *                }
 *   
 * 
 * Description of DataEditor
 *
 * @author sashi
 */
abstract class DataEditor implements ModelAction
{

    /**
     * Name of the table where the query will be performed
     */
    protected $table;

    /**
     * $data should be an associative array that contains a unique key or 
     * primary key of the data along with the field to be edited.
     * $db must be the handle of the database.
     */
    public abstract function edit($data, $db);

    /*
     * buildSQLUpdate simplifies the formation of mysql 'update' statements 
     * by using a data array to loop through the fields.
     */

    public static function buildSQLUpdate($table, $data)
    {
        $count = 0;
        $querySettings = "";
        foreach ($data as $key => $value) {
            //do NOT insert id field
            if ($key == 'id') {
                continue;
            }
            //asemble settings list (field=value)
            if ($count > 0) {
                $querySettings = $querySettings . ",";
            }
            $querySettings = $querySettings . $key . "='" . $value . "'";

            $count++;
        }

        return "update " . $table . " set " . $querySettings . " where id=" . $data['id'];
    }

}
