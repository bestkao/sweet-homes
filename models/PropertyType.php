<?php

/**
 * This Model class represents a PropertyType
 * This class has the columns of the PropertyType table statically mapped as attributes.
 * So, if any number of columns are added or edited in the PropertyType table in the Database
 * then attributes in this class has to be added/modified manually.  Also update
 * functions buildDataArray() and setAll().
 *
 * A new PropertyType can be instantiated and attirbutes can be set using the setters.
 * Then the new PropertyType is saved to the database using the save() function.
 *
 * And an exisiting PropertyType can be retirived using the class method find($uniqueID)
 * Similarly, existing PropertyType is saved to the database after editing by using
 * the save() function.
 *
 * getAll() and getBySearch($whereClause) allow additional retrieval methods.
 * getAll() gets all propertis and getBySearch() allows retrieval by sql logic -
 * $whereClause must use sql syntax.
 *
 * @author justina, Sashi
 */
class PropertyType implements Model
{
    /*Be sure when adding attributes to also add them in functions
     * buildDataArray() and setAll()
     *
     */

    private $id;
    private $name;

    private static $propertyTypeDatabase = null;

    public function __construct()
    {
        self::initPropertyTypeDatabase();
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Save this object to the Database
     */
    public function save()
    {
    }

    /**
     * Remove this object from the Database
     */
    public function remove()
    {
    }

    public function setAll(array $row)
    {

        if(isset($row['id']))$this->setID($row['id']);
        if(isset($row['name']))$this->setName($row['name']);
    }

    public function buildDataArray()
    {

        $data = array();

        if(isset($this->id))$data["id"] = $this->id;
        if(isset($this->name))$data["name"] = $this->name;

        return $data;
    }

    public static function find($uniqueID)
    {
        self::initPropertyTypeDatabase();
        $propertyType = null;
        $whereClause = "id = ".$uniqueID;
        $data = self::$propertyTypeDatabase->getBySearch($whereClause);
        if($data)$data = $data->fetch_assoc();

        if (is_array($data)) {
            $propertyType = new PropertyType();
            $propertyType->setAll($data);
        }
        return $propertyType;
    }
    
    /**
     * Returns an array of all the available PropertyType objects from the Database
     * Or if there are no available records then returns null.
     */
    public static function getAll()
    {
        self::initPropertyTypeDatabase();
        $propertyTypes = null;

        $list = self::$propertyTypeDatabase->get();
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $propertyTypes = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $propertyTypes[$i] = new PropertyType();
                $propertyTypes[$i]->setAll($row);
            }
        }
        return $propertyTypes;
    }

    private static function initPropertyTypeDatabase()
    {
        if (is_null(self::$propertyTypeDatabase)) {
            self::$propertyTypeDatabase = new ModelDatabase(
                    new PropertyTypeAdder("PropertyType"),
                    new PropertyTypeRemover("PropertyType"),
                    new PropertyTypeEditor("PropertyType"),
                    new PropertyTypeGetter("PropertyType")
            );
        }
    }

    public static function getBySearch($whereClause)
    {
        self::initPropertyTypeDatabase();
        $propertyTypes = null;

        $list = self::$propertyTypeDatabase->getBySearch($whereClause);

        if (!is_null($list) &&  $list!=false) {

            $num_results = $list->num_rows;

            if ($num_results > 0) {
                $propertyTypes = array($num_results);

                for ($i = 0; $i < $num_results; $i++) {
                    $row = $list->fetch_assoc();

                    $propertyTypes[$i] = new PropertyType();
                    $propertyTypes[$i]->setAll($row);
                }
            }
        }

        return $propertyTypes;
    }

}
