<?php

/**
 * This is a Model class that represents a WishList.
 * 
 * Here the ProertyID attributes from the table in the Database is mapped 
 * to an array of PropertyID.
 * So, firstPropertyID in the table would be $propertyID[0] etc.
 * And the maximum number of wish is staticly predefined.
 * So, if the maximum number of wish in the table changes then this needs to
 * be manually edited.
 * 
 * As wishList is made up of array of Property ID.
 * Most of the transaction in this WishList is either done via indexes or a 
 * Properties ID.
 * So, this WishList doesn't handle an actual Property Object. This needs to be
 * handled  by those using this class.
 * 
 * 
 * 
 * 
 * @author sashi
 */
class WishList implements Model
{
    private $id;
    private $propertyID;  // array of IDS of property 
    private $numberOfWish;
    private $isNew;
    private static $maxNumberWish=5;
    private static $wishListDatabase;
    
    public function __construct()
    {
        $this->propertyID = array(self::$maxNumberWish);
        $this->numberOfWish=0;
        $this->isNew=true;
        self::initWishiListDatabase();
    }
    
    /**
     * Sets the id of this WishList
     * @param type $id is the id of the Wishlist
     */
    public function setID($id)
    {
        $this->id=$id;
    }
    
    /**
     * 
     * @return type is the id of this WishList
     */
    public function getID()
    {
        return $this->id;
    }
    
    /**
     * Note: Maximum number of wish cannot be exceeded.
     *       So, if maximum number of wish is reached then returns false
     *       Also returns false in case of improper IDS.
     *       And, returns nothing if successful
     * @param type $prID is the ID of the Property to be added in the 
     *   WishList
     */
    public function addWish($prID)
    {
        if($this->numberOfWish< self::$maxNumberWish && $this->validID($prID))
            $this->propertyID[$this->numberOfWish++] = $prID;
        else return false;
    }
    
    /**
     * Returns false if the wish couldn't be found and removed from the 
     * WishList
     * Or else in success returns nothing.
     * 
     * @param type $prID is the ID of the property to be reomoved from the 
     *        WishList
     * 
     */
    public function removeWish($prID)
    {
        if(($index = $this->findWish($prID))!=false)
            $this->removeWishAt($index);
        else return false;
    }
    
    /**
     * Removes the wish (or the propertyID) which is at the given index in the 
     * WishList if it exists or does nothing.
     * @param type $index is the index of the WishList
     */
    public function removeWishAt($index)
    {
        if($this->validIndex($index))
            unset($this->propertyID[$index]);
        
    }
    
    /**
     * 
     * @param type $index is the index in the WishList
     * @return boolean false  if the index is improper. 
     * Or else Returns the the Wish (or the Property ID) at the 
     *  given index from the WishList.
     */
    public function getWish($index)
    {
       if($this->validIndex($index))
           return $this->propertyID[$index]; 
       return false;
    }
    
    /**
     * 
     * @return type is an array of wish containing all the wishes (or propertyID) 
     * in this WishList
     */
    public function getAllWish()
    {
        $wishes=array();
        
        for($i=0; $i < $this->numberOfWish; $i++ )
        {
            $wishes[$i] = $this->propertyID[$i];
        }
        
        return $wishes;
    }
    
    /**
     
     * @param type $pID is a Property ID to be looked for in the List
     * @return type is false if unsuccessful meaning cannot be found or 
     *   improper ID
     * Or else if found then returns its index in this WishList.
     */
    public function findWish($pID)
    {
        $result=false;
        
        if($this->validID($id)) {
            for($i=0; $i<$this->numberOfWish; $i++) {
                if($pID==$this->propertyID[$i]) {
                    $result = $i;
                    break;
                }
            }
        
        }
        return result;
    }
    
    
    public static function find($uniqueID)
    {
        
    }
    
    public static function getAll()
    {
        self::initWishiListDatabase();
        
    }
    
    
    public function save()
    {
        
    }
    
    
    public function remove() 
    {
        
    }
    
    /**
     * 
     * @param type $index is index to be checked for validity
     * @return boolean is true if the index is valid
     * or else false
     */
    private function validIndex($index)
    {
        if(is_int($index) && $index>=0 && $index<$this->numberOfWish)
            return true;
        
        return false;
    }
    
    /**
     * 
     * @param type $id is the $id to be checked for validity 
     * @return boolean is true if valid ID or else false.
     */
    private function validID($id)
    {
        if(is_int($id) && $id>=0)
            return true;
        return false;
    }
    
    private static function initWishiListDatabase()
    {
        if(is_null(self::$wishListDatabase))
            self::$wishListDatabase = new ModelDatabase(new WishListAdder(), 
                new WishListRemover, new WishListEditor, new WishListGetter);
    }



}
