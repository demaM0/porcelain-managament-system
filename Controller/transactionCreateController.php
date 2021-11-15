<?php
require_once("SingleTon.php");
class CreateTransaction
{

    public function CreateTransaction($FullPrice,$DateOfTransaction,$SupplierID,$ManagerID)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into transaction(FullPrice, DateOfTransaction, SupplierID, ManagerID) values ('$FullPrice', '$DateOfTransaction', '$SupplierID', '$ManagerID')";
        mysqli_query($con,$reg);
        
    }


}  
?>