<?php
require_once("SingleTon.php");
class CreateUserType
{

    public function CreateUserType($UserType)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into usertype(Name) values ('$UserType->Name')";
        mysqli_query($con,$reg);
        
    }


}  
?>