<?php
require_once("SingleTon.php");
class CreateInvoice
{

    public function Create($InvoiceDetails)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into invoicedetails(ItemID, InvoiceID,Quantity,Total) values ('$InvoiceDetails->DateTimeStamp', '$InvoiceDetails->SalesManID','$InvoiceDetails->CustomerID','$InvoiceDetails->Total')";
        mysqli_query($con,$reg);
        
    }


}  