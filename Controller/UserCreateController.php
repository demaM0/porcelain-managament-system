<?php
require_once("SingleTon.php");
class CreateUser
{

    public function CreateUser($Name,$Phone,$Email,$Password,$UserType)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into user(Name, Phone, Email, Password, UserType) values ('$Name', '$Phone', '$Email', '$Password', '$UserType')";
        mysqli_query($con,$reg);
        
    }


}  
?>