<?php

require_once('subject.php');
require_once('../Models/item-model.php');
	require_once('../Models/SingleTon.php');
    require_once('../Models/user-model.php');
class RealSubject  implements subjectproxy{

    
    public function ExecuteQuery($id)
    {
        $user = new user($id);
        $user->delete();
    }
}
?>