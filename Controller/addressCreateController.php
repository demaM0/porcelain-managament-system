<?php
require_once("SingleTon.php");
class CreateAddress
{

    public function CreateAddress($Address)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into address(City, Building, zipCode, SupplierID) values ('$Address->City', '$Address->Building', '$Address->zipCode', '$Address->SupplierID')";
        mysqli_query($con,$reg);
        
    }


}  
?>