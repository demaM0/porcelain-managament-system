<?php
require_once("SingleTon.php");
class CreateCustomer
{

    public function CreateCustomer($Customer)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into customer(Name, Phone, Email) values ('$Customer->Name', '$Customer->Phone', '$Customer->Email')";
        mysqli_query($con,$reg);
        
    }


}  
?>