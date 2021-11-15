<?php
require_once("SingleTon.php");
class CreateInstallment
{

    public function Create($Installment)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into installment(Quantity, InstallmentDate,TransactionID) values ('$Installment->Quantity', '$Installment->InstallmentDate','$Installment->TransactionID')";
        mysqli_query($con,$reg);
        
    }


}  