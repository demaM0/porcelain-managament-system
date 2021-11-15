<?php
require_once("SingleTon.php");
class CreateAddress
{

    public function CreateAddress($City,$Building,$zipCode,$SupplierID)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into address(City, Building, zipCode, SupplierID) values ('$City', '$Building', '$zipCode', '$SupplierID')";
        mysqli_query($con,$reg);
        
    }


}  
?>