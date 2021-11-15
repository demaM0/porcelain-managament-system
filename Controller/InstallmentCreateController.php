<?php
require_once("SingleTon.php");
class CreateInstallment
{

    public function Create($Quantity,$InstallmentDate,$TransactionID)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into installment(Quantity, InstallmentDate,TransactionID) values ('$Quantity', '$InstallmentDate','$TransactionID')";
        mysqli_query($con,$reg);
        
    }


}  