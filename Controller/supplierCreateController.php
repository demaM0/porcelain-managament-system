<?php
require_once("SingleTon.php");
class CreateSupplier
{

    public function CreateSupplier($Supplier)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into supplier(Name, Phone, Email) values ('$Supplier->Name', '$Supplier->Phone', '$Supplier->Email')";
        mysqli_query($con,$reg);
        
    }


}  
?>