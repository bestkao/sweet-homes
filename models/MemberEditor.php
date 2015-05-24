<?php

/**
 * This is a class MemberEditor that extends the class UserEditor.
 * This class handles the responsibility of editing existing data in the 
 * Database of a MemberModel if extenstions are needed from the UserModel.
 *  
 *  Example:-
 *           ...
 *           public function editMember($data)
 *           {
 *              ...
 *              $this->memberEditor->edit($data, $database); 
 *           }
 * @author justina
 */
final class MemberEditor extends UserEditor
{
    
}
