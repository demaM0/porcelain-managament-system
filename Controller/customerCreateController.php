<?php
require_once("SingleTon.php");
class CreateCustomer
{

    public function CreateCustomer($Name,$Phone,$Email)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into customer(Name, Phone, Email) values ('$Name', '$Phone', '$Email')";
        mysqli_query($con,$reg);
        
    }


}  
?>