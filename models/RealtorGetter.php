<?php

/**
 * This is a class RealtorGetter that extends the class UserGetter.
 * This class handles the responsibility of getting or extracting data from the 
 * Database of a RealtorModel if extensions are needed from the UserModel functions.
 *  
 *  Example:-
 *           ...
 *           public function getRealtor()
 *           {
 *              ...
 *              return ($this->realtorGetter->get()); 
 *           }
 * @author justina
 */
final class RealtorGetter extends UserGetter
{
    
}
