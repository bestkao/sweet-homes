<?php

/**
 * This is a class AdminEditor that extends the class UserEditor.
 * This class handles the responsibility of editing existing data in the 
 * Database of a AdminModel if extenstions are needed from the UserModel.
 *  
 *  Example:-
 *           ...
 *           public function editAdmin($data)
 *           {
 *              ...
 *              $this->adminEditor->edit($data, $database); 
 *           }
 * @author justina
 */
final class AdminEditor extends UserEditor
{
    
}
