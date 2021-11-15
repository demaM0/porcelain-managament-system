<?php
require_once("SingleTon.php");
class CreateUser
{

    public function CreateUser($User)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into user(Name, Phone, Email, Password, UserType) values ('$User->Name', '$User->Phone', '$User->Email', '$User->Password', '$User->UserType')";
        mysqli_query($con,$reg);
        
    }


}  
?>