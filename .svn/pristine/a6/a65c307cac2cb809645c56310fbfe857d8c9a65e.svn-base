<?php

//include 'Model.php';

/**
 * This Model class represents an Admin (manages other users and properties)
 * This class has the columns of the Admin table staticly mapped as attributes.
 * So, if any number of columns are added or edited in the Admin table in the Database
 * then attributes in this class has to be added/modified manually.  Also update
 * functions buildDataArray() and setAll().
 *
 * A new Admin can be instantiated and attributes can be set using the setters.
 * Then the new Admin is saved to the database using the save() function.
 * 
 * And an existing admin can be retrieved using the class method find($uniqueID)
 * Similarly, existing Admin is saved to the database after editing by using
 * the save() function.
 * 
 * getAll() and getBySearch($whereClause) allow additional retrieval methods.  
 * getAll() gets all admins and getBySearch() allows retrieval by sql logic - 
 * $whereClause must use sql syntax.
 * 
 * 
 * @author sashi/justina
 */
class Admin implements Model
{
    /*Be sure when adding attributes to also add them in functions
     * buildDataArray() and setAll()
     * 
     */

    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $email;
    private $isNew;
    private static $adminDatabase = null;

    public function __construct($isNew)
    {
        $this->isNew = $isNew;
        self::initAdminDatabase();
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($user)
    {
        $this->username = $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($pw)
    {
        $this->password = $pw;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($fName)
    {
        $this->firstName = $fName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lName)
    {
        $this->lastName = $lName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Save this object to the Database
     */
    public function save()
    {
        if ($this->isNew) {
            //add new
            $data = $this->buildDataArray();
            self::$adminDatabase->add($data);
            $this->isNew = false;
        } else {
            //edit
            $data = $this->buildDataArray();
            self::$adminDatabase->edit($data);
        }
    }

    public static function find($uniqueID)
    {
        //extract the row with given ID from Database
        //if found create an Admin object with the retrieved attributes
        //then set the isNew of that object to false
        //return the object
        $admin = null;
        $whereClause = "id=" . $uniqueID;
        $data = self::$adminDatabase->getBySearch($whereClause);
        if (count($data) != 0) {
            $admin = new Admin(false);
            $admin->setAll($data);
            //$admin->setIsNew(false);
        }
        return $admin;
    }

    /**
     * Returns an array of all the available Admin objects from the Database
     * Or if there are no available records then returns null.
     */
    public static function getAll()
    {
        self::initAdminDatabase();
        $admins = null;

        $list = self::$adminDatabase->get();
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $admins = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $admins[$i] = new Admin(false);
                $admins[$i]->setAll($row);
            }
        }
        return $admins;
    }

    /**
     * 
     * @param type $whereClause is the search criteria by which matchin admins will
     *  be selected
     * @return array of Admin objects matching the search keyu if found 
     * or else null
     */
    public static function getBySearch($whereClause)
    {
        self::initAdminDatabase();
        $admins = null;

        $list = self::$adminDatabase->getBySearch($whereClause);
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $admins = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $admins[$i] = new Admin(false);
                $admins[$i]->setAll($row);
            }
        }

        return $admins;
    }

    private static function initAdminDatabase()
    {
        if (is_null(self::$adminDatabase)) {
            self::$adminDatabase = new ModelDatabase(
                    new AdminAdder("Admin"), 
                    new AdminRemover("Admin"),
                    new AdminEditor("Admin"), 
                    new AdminGetter("Admin")
            );
        }
    }

    public function buildDataArray()
    {
        $data = array(
            "id" => $this->id,
            "username" => $this->username,
            "password" => $this->password,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
        );
        return $data;
    }

    public function setAll(array $row)
    {
        $this->setID($row['id']);
        $this->setUsername($row['username']);
        $this->setPassword($row['password']);
        $this->setFirstName($row['firstName']);
        $this->setLastName($row['lastName']);
        $this->setEmail($row['email']);
    }

    public function remove()
    {
        self::$adminDatabase->remove($this->id);
    }

}
