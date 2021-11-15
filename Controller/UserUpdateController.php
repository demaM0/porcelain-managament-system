<?php
require_once("SingleTon.php");
class UpdateUser
{
    public function Update($User)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($User->Name!=NULL)
        {
            $sql = "update user SET Name=$User->Name Where Id=$User->Id";
        }
        if($User->Phone!=NULL)
        {
            $sql = "update user SET Phone=$User->Phone Where Id=$User->Id";
        }
        if($User->Email!=NULL)
        {
            $sql = "update user SET Email=$User->Email Where Id=$User->Id";
        }
        if($User->Password!=NULL)
        {
            $sql = "update user SET Password=$User->Password Where Id=$User->Id";
        }
        if($User->UserType!=NULL)
        {
            $sql = "update user SET UserType=$User->UserType Where Id=$User->Id";
        }
     
    }
}

?>
