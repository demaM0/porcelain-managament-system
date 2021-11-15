<?php
require_once("SingleTon.php");
class CreateInvoice
{

    public function Create($Invoice)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into items(DateTimeStamp, SalesManID,CustomerID,Total) values ('$Invoice->DateTimeStamp', '$Invoice->SalesManID','$Invoice->CustomerID','$Invoice->Total')";
        mysqli_query($con,$reg);
        
    }


}  



?>