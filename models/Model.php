<?php


/**
 *  This is an interface Model that creates an abstraction of a real world entity
 *  And lays the basic foundation to implement a real model object.
 *  This can be implemented by any object that represents itself as a real world 
 *  entity like Car, House etc.
 *  Also, the implementing classes need to implement all the abstract functions.
 * 
 *  Implementing classes are Member, Property, Realtor, Administrator.
 * 
 * @author sashi
 */
interface Model 
{
    /**
     * Returns a new model object with the given primary key if it exists
     * in the database 
     * or else returns false. 
     * @param type $uniqueID is the unique ID or Key of the record of this
     *  type of Object in the Database
     */
    public static function find($uniqueID);
    
    /**
     * Maps all the records from the Database table of this Model to objects
     * Returns the array of all the available objects from the records found in 
     * the Database
     * Or returns null if there table associated with this Model in the Database 
     * is empty
     */
    public static function getAll();
    
    /**
     * Maps the records from the Database table of this Model that satisfy the
     * logic of the $whereClause (must be sql syntax) to objects
     * Returns the array of matching objects from the records found in 
     * the Database Or returns null if there are no matching records
     */
    public static function getBySearch($whereClause);
    
    /**
     * Saves this Object to the associated table in the Database.
     */
    public function save();
    
    /**
     * Completely removes this object from the Database
     */
    public function remove();
    
    /**
     * Builds an associated array of data using table field names as array keys 
     * and table object values as values.  Returns array;
     */
    public function buildDataArray();
    
    /**
     * Sets table object values to the values contained in the associated array
     * (see buildDataArray()).
     */
    public function setAll(array $data);
    
}
