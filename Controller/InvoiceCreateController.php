<?php
require_once("SingleTon.php");
class CreateInvoice
{

    public function Create($DateTimeStamp,$SalesManID,$CustomerID,$Total)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into invoice(DateTimeStamp, SalesManID,CustomerID,Total) values ('$DateTimeStamp', '$SalesManID','$CustomerID','$Total')";
        mysqli_query($con,$reg);
        
    }


}  



?>