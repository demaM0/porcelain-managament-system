<?php
require_once("SingleTon.php");
class UpdateInstsallment
{
    public function Update($Installment)
    {
        $con =DbConnection::getInstance(); 
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }

        if($Installment->Quantity!=NULL)
        {
            $sql = "update installment SET Quantity=$Installment->Quantity Where ID=$Installment->ID";
        }
        if($Installment->SalesManID!=NULL)
        {
            $sql = "update installment SET InstallmentDate=$Installment->InstallmentDate Where ID=$Installment->ID";
        }
        if($Installment->CustomerID!=NULL)
        {
            $sql = "update installment SET TransactionID=$Installment->TransactionID Where ID=$Installment->ID";
        }
        
       
        mysqli_query($con,$sql);
    }
}

?>