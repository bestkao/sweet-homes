<?php

//include 'Model.php';

/**
 * This Model class represents a Realtor (manages properties)
 * This class has the columns of the Realtor table staticly mapped as attributes.
 * So, if any number of columns are added or edited in the Realtor table in the Database
 * then attributes in this class has to be added/modified manually.  Also update
 * functions buildDataArray() and setAll().
 *
 * A new Realtor can be instantiated and attributes can be set using the setters.
 * Then the new Realtor is saved to the database using the save() function.
 * 
 * And an existing realtor can be retrieved using the class method find($uniqueID)
 * Similarly, existing Realtor is saved to the database after editing by using
 * the save() function.
 * 
 * getAll() and getBySearch($whereClause) allow additional retrieval methods.  
 * getAll() gets all realtors and getBySearch() allows retrieval by sql logic - 
 * $whereClause must use sql syntax.
 * 
 * @author justina
 */
class Realtor implements Model
{
    /*Be sure when adding attributes to also add them in functions
     * buildDataArray() and setAll()
     * 
     */

    private $id;
    private $username;
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $phoneMobile;
    private $phoneOffice;
    private $about;
    private $picFilename;
    private $enabled = 1;
    private $isNew;
    
    private static $realtorDatabase;
    
    

    public function __construct()
    {
        $this->isNew = true;
        self::initRealtorDatabase();
    }

    public function getID()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName()
    {
        $full = $this->firstName . " " . $this->lastName;
        return $full;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    public function getPhoneOffice()
    {
        return $this->phoneOffice;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function getPicFilename()
    {
        return $this->picFilename;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setUsername($user)
    {
        $this->username = $user;
    }

    public function setPassword($pswd)
    {
        $this->password = $pswd;
    }

    public function setEmail($eml)
    {
        $this->email = $eml;
    }

    public function setFirstName($frst)
    {
        $this->firstName = $frst;
    }

    public function setLastName($lst)
    {
        $this->lastName = $lst;
    }

    public function setPhoneMobile($phone)
    {
        $this->phoneMobile = $phone;
    }

    public function setPhoneOffice($phone)
    {
        $this->phoneOffice = $phone;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function setPicFilename($fname)
    {
        $this->picFilename = $fname;
    }

    public function setEnabled($en)
    {
        $this->enabled = $en;
    }

    public function setIsNew($val)
    {
        $this->isNew = $val;
    }
    
    /**
     * Save this object to the Database
     */
    public function save()
    {
        if ($this->isNew) {
            $data = $this->buildDataArray();
            self::$realtorDatabase->add($data);
            $this->isNew = false;
        } else {
            $data = $this->buildDataArray();
            self::$realtorDatabase->edit($data);
        }
    }

    public function remove()
    {
        self::$realtorDatabase->remove($this->id);
    }

    
    /**
     * Returns a Member object with the given ID if found in the Database
     * Or else returns false
     */
    public static function find($uniqueID)
    {
        //extract the row with given ID from Database
        //if found create an Member object with the retrieved attributes
        //then set the isNew of that object to false
        //return the object
        self::initRealtorDatabase();
        $realtor = null;
        $whereClause = "id=" . $uniqueID;
        $data = self::$realtorDatabase->getBySearch($whereClause);
        if ($data!=false) {
             $data = $data->fetch_assoc();
            $realtor = new Realtor(false);
            $realtor->setAll($data);
            $realtor->setIsNew(false);
        }
        return $realtor;
    }

    /**
     * 
     * @param type $passwd is password of the member to be extracted
     * @return Member if found in the table
     */
    public static function wherePassword($passwd)
    {
        self::initRealtorDatabase();
        $realtor = null;
        $whereClause = "password='" . $passwd."'";
        $data = self::$realtorDatabase->getBySearch($whereClause);
        
        if (count($data) > 0 && $data!=false) {
            $data = $data->fetch_assoc();
            if(is_array($data)){
            $realtor = new Realtor(false);
            $realtor->setAll($data);
            $realtor->setIsNew(false);
            }
        }
        return $realtor;
        
    }
    
    public static function whereEmailAndPassword($email, $password)
    {
        self::initRealtorDatabase();
        $realtor = null;
        $whereClause = "email='" . $email . "'" . " and "
                . "password='" . $password . "'";
        $data = self::$realtorDatabase->getBySearch($whereClause);

        if (count($data) > 0 && $data != false ) {
            $data = $data->fetch_assoc();
            if (is_array($data)) {
                $realtor = new Realtor(false);
                $realtor->setAll($data);
                $realtor->setIsNew(false);
            }
        }
        
        return $realtor;
    }
    
    public static function whereEmail($email)
    {
        self::initRealtorDatabase();
        $realtor = null;
        $whereClause = "email='" . $email . "'";
        $data = self::$realtorDatabase->getBySearch($whereClause);

        if (count($data) > 0 && $data != false) {
            $data = $data->fetch_assoc();
            if (is_array($data)) {
                $realtor = new Member(false);
                $realtor->setAll($data);
                $realtor->setIsNew(false);
            }
        }
        
        return $realtor;
        
    }

    /**
     * Returns an array of all the available Realtor objects from the Database
     * Or if there are no available records then returns null.
     */
    public static function getAll()
    {
        self::initRealtorDatabase();
        $realtors = null;

        $list = self::$realtorDatabase->get();
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $realtors = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $realtors[$i] = new Realtor(false);
                $realtors[$i]->setAll($row);
            }
        }
        return $realtors;        
    }

    /**
     * 
     * @param type $whereClause is the search criteria by which matchin realtors will
     *  be selected
     * @return array of Realtor objects matching the search keyu if found 
     * or else null
     */
    public static function getBySearch($whereClause)
    {
        self::initRealtorDatabase();
        $realtors = null;

        $list = self::$realtorDatabase->getBySearch($whereClause);
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $realtors = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $realtors[$i] = new Realtor(false);
                $realtors[$i]->setAll($row);
            }
        }

        return $realtors;
    }

    public function buildDataArray()
    {
        $data = array();
        
        if(isset($this->id))$data['id'] = $this->id;
        if(isset($this->username))$data['username'] = $this->username;
        if(isset($this->password))$data['password'] = $this->password;
        if(isset($this->email))$data['email'] = $this->email;
        if(isset($this->firstName))$data['firstName'] = $this->firstName;
        if(isset($this->lastName)) $data['lastName'] = $this->lastName;
        if(isset($this->phoneMobile))$data['phoneMobile'] = $this->phoneMobile;
        if(isset($this->phoneOffice))$data['phoneOffice'] = $this->phoneOffice;
        if(isset($this->about))$data['about'] = $this->about;
        if(isset($this->picFilename))$data['picFilename'] = $this->picFilename;
        if(isset($this->enabled))$data['enabled'] = $this->enabled;
        
        return $data;
    }

    public function setAll(array $data)
    {
        if (isset($data['id'])) {
            $this->setID($data['id']);
        }
        if (isset($data['username']) ) {
            $this->setUsername($data['username']);
        }
        if (isset($data['password'])) {
            $this->setPassword($data['password']);
        }
        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }
        if (isset($data['firstName'])) {
            $this->setFirstName($data['firstName']);
        }
        if (isset($data['lastName'])) {
            $this->setLastName($data['lastName']);
        }
        if (isset($data['phoneMobile'])) {
            $this->setPhoneMobile($data['phoneMobile']);
        }
        if (isset($data['phoneOffice'])) {
            $this->setPhoneOffice($data['phoneOffice']);
        }
        if (isset($data['about'])) {
            $this->setAbout($data['about']);
        }
        if (isset($data['picFilename'])) {
            $this->setPicFilename($data['picFilename']);
        }
        if (isset($data['enabled'])) {
            $this->setEnabled($data['enabled']);
        }
    }

    private static function initRealtorDatabase()
    {
        if (is_null(self::$realtorDatabase)) {
            self::$realtorDatabase = new ModelDatabase(
                    new RealtorAdder("Realtor"), 
                    new RealtorRemover("Realtor"),
                    new RealtorEditor("Realtor"), 
                    new RealtorGetter("Realtor")
            );
        }
    }

}
