<?php

/**
 * This is a class MemberGetter that extends the class UserGetter.
 * This class handles the responsibility of getting or extracting data from the 
 * Database of a MemberModel if extensions are needed from the UserModel functions.
 *  
 *  Example:-
 *           ...
 *           public function getMember()
 *           {
 *              ...
 *              return ($this->memberGetter->get()); 
 *           }
 * @author justina
 */
final class MemberGetter extends UserGetter
{
    
}
