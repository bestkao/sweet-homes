<?php

//include 'Model.php';

/**
 * This Model class represents a Member (website user who has login capabilities)
 * This class has the columns of the Member table staticly mapped as attributes.
 * So, if any number of columns are added or edited in the Member table in the Database
 * then attributes in this class has to be added/modified manually.  Also update
 * functions buildDataArray() and setAll().
 *
 * A new Member can be instantiated and attributes can be set using the setters.
 * Then the new Member is saved to the database using the save() function.
 * 
 * And an existing member can be retrieved using the class method find($uniqueID)
 * Similarly, existing Member is saved to the database after editing by using
 * the save() function.
 * 
 * getAll() and getBySearch($whereClause) allow additional retrieval methods.  
 * getAll() gets all members and getBySearch() allows retrieval by sql logic - 
 * $whereClause must use sql syntax.
 * 
 * @author sashi,justina
 */
class Member implements Model
{
    /*Be sure when adding attributes to also add them in functions
     * buildDataArray() and setAll()
     * 
     */

    private $id;
    
    private $google = 0;// We might not implement this but even if we did this is not 
    // a good way.
    
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $phone;
    private $wishlist;
    private $enabled = 1;
    
    private $wishlistArray = array();
    private static $memberDatabase;
    private $isNew;
    
    //TO DO - wishlist management, whether array (comma delim list in table) or 
    //own table

    public function __construct()
    {   
        $this->isNew=true;
        self::initMemberDatabase();
        //$this->wishlist = new WishList();   jtc-wishlist table?
    }

    public function getID()
    {
        return $this->id;
    }

    public function getGoogle()
    {
        return $this->google;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function getWishlist()
    {
        return $this->wishlist;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    /*jtc-wishlist table?
    public function getAllWish()
    {
        $propertiesInWishlist = array();
        $wishes = $this->wishlist->getAll();

        for ($i = 0; $i < count($wishes); $i++) {
            $propertiesInWishlist[$i] = Property::find($wishes[$i]);
        }
        return $propertiesInWishlist;
    }
     * 
     */

    public function setID($id)
    {
        if(isset($id))$this->id = $id;
    }

    public function setGoogle($google)
    {
        $this->google = $google;
    }

    public function setPassword($pswd)
    {
        
        if(isset($pswd))$this->password = $pswd;
    }

    public function setEmail($eml)
    {
        if(isset($eml))$this->email = $eml;
    }

    public function setFirstName($frst)
    {
        if(isset($first))$this->firstName = $frst;
    }

    public function setLastName($lst)
    {
        if(isset($lst))$this->lastName = $lst;
    }

    public function setPhone($phone)
    {
        if(isset($phone))$this->phone = $phone;
    }

    public function setWishlist($wlist)
    {
        $this->wishlist = $wlist;
    }

    public function setEnabled($en)
    {
        if(isset($en))$this->enabled = $en;
    }

    public function setIsNew($val)
    {
        $this->isNew=$val;
    }
    /*jtc-wishlist table?
    public function setWishlist($wlistID)
    {
        $this->wishlist->setID($wlistID);
    }

    public function addWishToWishlist($pID)
    {
        $this->wishlist->addWish($prID);
    }
     * 
     */

    /**
     * Save this object to the Database
     */
    public function save()
    {
        if ($this->isNew) {
            $data = $this->buildDataArray();
            self::$memberDatabase->add($data);
            $this->isNew = false;
        } else {
            $data = $this->buildDataArray();
            self::$memberDatabase->edit($data);
        }
    }

    public function remove()
    {
        self::$memberDatabase->remove($this->id);
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
        self::initMemberDatabase();
        $member = null;
        $whereClause = "id=" . $uniqueID;
        $data = self::$memberDatabase->getBySearch($whereClause);
        
        if ($data!=false) {
            $data = $data->fetch_assoc();
            $member = new Member(false);
            $member->setAll($data);
            $member->setIsNew(false);
        }
        return $member;
    }

    /**
     * 
     * @param type $passwd is password of the member to be extracted
     * @return Member if found in the table
     */
    public static function wherePassword($passwd)
    {
        self::initMemberDatabase();
        $member = null;
        $whereClause = "password='" . $passwd."'";
        $data = self::$memberDatabase->getBySearch($whereClause);
        
        if (count($data) > 0 && $data!=false) {
            $data = $data->fetch_assoc();
            if(is_array($data)){
            $member = new Member(false);
            $member->setAll($data);
            $member->setIsNew(false);
            }
        }
        return $member;
        
    }
    
    public static function whereEmailAndPassword($email, $password)
    {
        self::initMemberDatabase();
        $member = null;
        $whereClause = "email='" . $email . "'" . " and "
                . "password='" . $password . "'";
        $data = self::$memberDatabase->getBySearch($whereClause);

        if (count($data) > 0 && $data != false ) {
            $data = $data->fetch_assoc();
            if (is_array($data)) {
                $member = new Member(false);
                $member->setAll($data);
                $member->setIsNew(false);
            }
        }
        
        return $member;
    }
    
    public static function whereEmail($email)
    {
        self::initMemberDatabase();
        $member = null;
        $whereClause = "email='" . $email . "'";
        $data = self::$memberDatabase->getBySearch($whereClause);

        if (count($data) > 0 && $data != false) {
            $data = $data->fetch_assoc();
            if (is_array($data)) {
                $member = new Member(false);
                $member->setAll($data);
                $member->setIsNew(false);
            }
        }
        
        return $member;
        
    }
    
    /**
     * Returns an array of all the available Member objects from the Database
     * Or if there are no available records then returns null.
     */
    public static function getAll()
    {
        self::initMemberDatabase();
        $members = null;

        $list = self::$memberDatabase->get();
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $members = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $members[$i] = new Member(false);
                $members[$i]->setAll($row);
            }
        }
        return $members;        
    }

    /**
     * 
     * @param type $whereClause is the search criteria by which matchin members will
     *  be selected
     * @return array of Member objects matching the search keyu if found 
     * or else null
     */
    public static function getBySearch($whereClause)
    {
        self::initMemberDatabase();
        $members = null;

        $list = self::$memberDatabase->getBySearch($whereClause);
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $members = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $members[$i] = new Member(false);
                $members[$i]->setAll($row);
            }
        }

        return $members;
    }

    public function buildDataArray()
    {
        $data = array();

        if (isset($this->id))
            $data['id'] = $this->id;

        if (isset($this->password))
            $data['password'] = $this->password;
        if (isset($this->email))
            $data['email'] = $this->email;
        if (isset($this->firstName))
            $data['firstName'] = $this->firstName;
        if (isset($this->lastName))
            $data['lastName'] = $this->lastName;
        if (isset($this->phone))
            $data['phone'] = $this->phone;

        if (isset($this->enabled))
            $data['enabled'] = $this->enabled;

        return $data;
    }

    public function setAll(array $data)
    {
        if(isset($data['id']))$this->setID($data['id']);
        //$this->setGoogle($data['google']);
        if(isset($data['password']))$this->setPassword($data['password']);
        if(isset($data['email']))$this->setEmail($data['email']);
        if(isset($data['firstName']))$this->setFirstName($data['firstName']);
        if(isset($data['lastName']))$this->setLastName($data['lastName']);
        if(isset($data['phone']))$this->setPhone($data['phone']);
       // $this->setWishlist($data['wishlist']);
        if(isset($data['enabled']))$this->setEnabled($data['enabled']);
    }

    private static function initMemberDatabase()
    {
        if (is_null(self::$memberDatabase)) {
            self::$memberDatabase = new ModelDatabase(
                    new MemberAdder("Member"), 
                    new MemberRemover("Member"),
                    new MemberEditor("Member"), 
                    new MemberGetter("Member")
            );
        }
    }

}
