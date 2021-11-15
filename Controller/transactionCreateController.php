<?php
require_once("SingleTon.php");
class CreateTransaction
{

    public function CreateTransaction($Transaction)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into transaction(FullPrice, DateOfTransaction, SupplierID, ManagerID) values ('$Transaction->FullPrice', '$Transaction->DateOfTransaction', '$Transaction->SupplierID', '$Transaction->ManagerID')";
        mysqli_query($con,$reg);
        
    }


}  
?>