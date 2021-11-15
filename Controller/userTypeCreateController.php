<?php
require_once("SingleTon.php");
class CreateUserType
{

    public function CreateUserType($Name)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into usertype(Name) values ('$Name')";
        mysqli_query($con,$reg);
        
    }


}  
?>