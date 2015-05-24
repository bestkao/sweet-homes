<?php



/**
 * This is a InputFilter class that provides service of filtering inputs.
 * 
 * All of the functions are class type so no need to instantiate this class to use
 * any of the functionality. 
 * The functionality provided by this class are as follows:
 *   1) Filter input for code Injection
 *   2) Check for valid phone number
 * 
 * Example :-
 *        $search = InputFilter::filter($_POST['search_value']);
 *        $properties = Property::getBySearch($search);
 *        ...
 *          
 * 
 * @author sashi
 */
class InputFilter 
{
    public static function filter($userInput)
    {
        $databaseConnector = new DatabaseConnector();
        $db=$databaseConnector->connect();
        if($db)
         $userInput = mysqli_real_escape_string($db,$userInput);
        else $userInput=false;
        
        $db->close();
        
        return $userInput;
    }
    
    public static function validPhoneNumber($phone)
    {
        $valid = false;
        
        if(preg_match("/^[0-9]{3}(-)[0-9]{3}(-)[0-9]{4}$/", $phone)) {
            $valid = true;
        }
        
      
        return $valid;
    }
    
    public static function isInteger($value) 
    {
        $valid=false;
        
        if(preg_match("/^[0-9]/", $value)){
            $valid=true;
        }
        
        return $valid;
        
    }
}
