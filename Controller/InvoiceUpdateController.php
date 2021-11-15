<?php
require_once("SingleTon.php");
class UpdateInvoice
{
    public function Update($Invoice)
    {
        $con =DbConnection::getInstance(); 
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }

        if($Invoice->DateTimeStamp!=NULL)
        {
            $sql = "update items SET Category=$Invoice->DateTimeStamp Where ID=$Invoice->ID";
        }
        if($Invoice->SalesManID!=NULL)
        {
            $sql = "update items SET SalesManID=$Invoice->SalesManID Where ID=$Invoice->ID";
        }
        if($Invoice->CustomerID!=NULL)
        {
            $sql = "update items SET CustomerID=$Invoice->CustomerID Where ID=$Invoice->ID";
        }
        if($Invoice->Total!=NULL)
        {
            $sql = "update items SET Total=$Invoice->Total Where ID=$Invoice->ID";
        }
       
        mysqli_query($con,$sql);
    }
}

?>