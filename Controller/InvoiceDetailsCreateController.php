<?php
require_once("SingleTon.php");
class CreateInvoiceDetails
{

    public function Create($ItemID,$InvoiceID,$Quantity,$Total)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into invoicedetails(ItemID, InvoiceID,Quantity,Total) values ('$ItemID', '$InvoiceID->SalesManID','$Quantity','$Total')";
        mysqli_query($con,$reg);
        
    }


}  