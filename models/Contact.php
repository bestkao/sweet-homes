<?php

/**
 * Description of Contact
 *
 * @author nidhi
 */
class Contact implements Model
{
    //put your code here
    private $id;
    private $name;
    private $email;
    private $message;
    private $phoneNumber;
    private $memberId;
    private $contactType;
    private $customerName;
    private $propertyId;
    private $propertyAddress;
    private $realtor;
    private $isNew;
    
    private static $contactDatabase;
    
    public function __construct()
    {   
        $this->isNew=true;
        self::initContactDatabase();
    }
    
     public function getID()
    {
        return $this->id;
    }
    
     public function getName()
    {
        return $this->name;
    }
    
     public function getEmail()
    {
        return $this->email;
    }
    
     public function getMessage()
    {
        return $this->message;
    }
    
     public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
     public function getMemberID()
    {
        return $this->memberId;
    }
    
     public function getContactType()
    {
        return $this->contactType;
    }
    
     public function getCustomerName()
    {
        return $this->customerName;
    }
    
     public function getPropertyID()
    {
        return $this->propertyId;
    }
    
     public function getPropertyAddress()
    {
        return $this->propertyAddress;
    }
    
     public function getRealtor()
    {
        return $this->realtor;
    }
    
    public function getIsNew()
    {
        return $this->isNew;
    }
    
    
     public function setID($id)
    {
        if(isset($id))$this->id = $id;
    }
    
     public function setName($name)
    {
        if(isset($name))$this->name = $name;
    }
    
     public function setEmail($email)
    {
        if(isset($email))$this->email = $email;
    }
    
     public function setMessage($message)
    {
        if(isset($message))$this->message = $message;
    }
    
     public function setPhoneNumber($phone)
    {
        if(isset($phone))$this->phoneNumber = $phone;
    }
    
     public function setMemberId($memberId)
    {
        if(isset($memberId))$this->memberId = $memberId;
    }
    
     public function setContactType($contactType)
    {
        if(isset($contactType))$this->$contactType = $contactType;
    }
    
       public function setCustomerName($cname)
    {
        if(isset($cname))$this->customerName = $cname;
    }
    
       public function setPropertyId($pid)
    {
        if(isset($pid))$this->propertyId = $pid;
    }
    
       public function setPropertyAddress($paddress)
    {
        if(isset($paddress))$this->propertyAddress = $paddress;
    }
    
       public function setRealtor($realtor)
    {
        if(isset($realtor))$this->$realtor = $realtor;
    }
    
    
     /**
     * Save this object to the Database
     */
    public function save()
    {
        if ($this->isNew) {
            $data = $this->buildDataArray();
            self::$contactDatabase->add($data);
            $this->isNew = false;
        } else {
            $data = $this->buildDataArray();
            self::$contactDatabase->edit($data);
        }
        
    }
    
     public function remove()
    {
        self::$contactDatabase->remove($this->id);
    }
    
     /**
     * Returns a Contact object with the given ID if found in the Database
     * Or else returns false
     */
    public static function find($uniqueID)
    {
        //extract the row with given ID from Database
        //if found create an Contact object with the retrieved attributes
        //then set the isNew of that object to false
        //return the object
        self::initContactDatabase();
        $contact = null;
        $whereClause = "id=" . $uniqueID;
        $data = self::$contactDatabase->getBySearch($whereClause);
        
        if ($data!=false) {
            $data = $data->fetch_assoc();
            $contact = new Contact(false);
            $contact->setAll($data);
            $contact->setIsNew(false);
        }
        return $contact;
    }
    
    
      /**
     * Returns an array of all the available Contact objects from the Database
     * Or if there are no available records then returns null.
     */
    public static function getAll()
    {
        self::initContactDatabase();
        $contacts = null;

        $list = self::$contactDatabase->get();
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $contacts = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $contacts[$i] = new Contact(false);
                $contacts[$i]->setAll($row);
            }
        }
        return $contacts;        
    }
    
     /**
     * 
     * @param type $whereClause is the search criteria by which matching contacts will
     *  be selected
     * @return array of Contact objects matching the search keyu if found 
     * or else null
     */
    public static function getBySearch($whereClause)
    {
        self::initContactDatabase();
        $contacts = null;

        $list = self::$contactDatabase->getBySearch($whereClause);
        $num_results = $list->num_rows;

        if ($num_results > 0) {
            $contacts = array($num_results);

            for ($i = 0; $i < $num_results; $i++) {
                $row = $list->fetch_assoc();

                $contacts[$i] = new Contact(false);
                $contacts[$i]->setAll($row);
            }
        }

        return $contacts;
    }

     public function buildDataArray()
    {
        $data = array();

        if (isset($this->id))
            $data['id'] = $this->id;

        if (isset($this->name))
            $data['name'] = $this->name;
        if (isset($this->email))
            $data['email'] = $this->email;
        if (isset($this->message))
            $data['message'] = $this->message;
        if (isset($this->phoneNumber))
            $data['phoneNumber'] = $this->phoneNumber;
        if (isset($this->memberId))
            $data['memberId'] = $this->memberId;

        if (isset($this->contactType))
            $data['contactType'] = $this->contactType;
        
         if (isset($this->customerName))
            $data['customerName'] = $this->customerName;
        if (isset($this->propertyId))
            $data['propertyId'] = $this->propertyId;

        if (isset($this->propertyAddress))
            $data['propertyAddress'] = $this->propertyAddress;
         if (isset($this->realtor))
            $data['realtor'] = $this->realtor;

        return $data;
    }
    
        public function setAll(array $data)
    {
        if(isset($data['id']))$this->setID($data['id']);
    
        if(isset($data['name']))$this->name=$data['name'];
        if(isset($data['email']))$this->email=$data['email'];
        if(isset($data['message'])) $this->message =$data['message'];
        if(isset($data['phoneNumber']))$this->phoneNumber=$data['phoneNumber'];
        if(isset($data['memberId']))$this->memberId=$data['memberId'];
   
        if(isset($data['contactType']))$this->contactType=$data['contactType'];
        if(isset($data['customerName']))$this->customerName=$data['customerName'];
        if(isset($data['propertyId']))$this->propertyId=$data['propertyId'];
   
        if(isset($data['propertyAddress']))$this->setPropertyAddress($data['propertyadress']);
        if(isset($data['realtor']))$this->realtor=$data['realtor'];
    }

    private static function initContactDatabase()
    {
        if (is_null(self::$contactDatabase)) {
            self::$contactDatabase = new ModelDatabase(
                    new ContactAdder("contact"), 
                    new ContactRemover("contact"),
                    new ContactEditor("contact"), 
                    new ContactGetter("contact")
            );
        }
    }
    
       
    
}
