<?php
require_once("SingleTon.php");
class UpdateUserType
{
    public function Update($UserType)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($UserType->Name!=NULL)
        {
            $sql = "update usertype SET Name=$UserType->Name Where Id=$UserType->Id";
        }
     
    }
}

?>
