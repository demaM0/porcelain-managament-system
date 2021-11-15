<?php
require_once("SingleTon.php");
class UpdateInvoiceDetails
{
    public function Update($InvoiceDetails)
    {
        $con =DbConnection::getInstance(); 
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }

        if($InvoiceDetails->Quantity!=NULL)
        {
            $sql = "update InvoiceDetails SET ItemID=$InvoiceDetails->ItemID Where ID=$InvoiceDetails->ID";
        }
        if($InvoiceDetails->SalesManID!=NULL)
        {
            $sql = "update InvoiceDetails SET InvoiceID=$InvoiceDetails->InvoiceID Where ID=$InvoiceDetails->ID";
        }
        if($InvoiceDetails->CustomerID!=NULL)
        {
            $sql = "update InvoiceDetails SET Quantity=$InvoiceDetails->Quantity Where ID=$InvoiceDetails->ID";
        }
        if($InvoiceDetails->CustomerID!=NULL)
        {
            $sql = "update InvoiceDetails SET Total=$InvoiceDetails->Total Where ID=$InvoiceDetails->ID";
        }
        
       
        mysqli_query($con,$sql);
    }
}

?>