<?php
require_once("SingleTon.php");
class CreateSupplier
{

    public function CreateSupplier($Name,$Phone,$Email)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into supplier(Name, Phone, Email) values ('$Name', '$Phone', '$Email')";
        mysqli_query($con,$reg);
        
    }


}  
?>