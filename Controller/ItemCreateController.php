<?php
require_once("SingleTon.php");
class Create
{

    public function CreateItem($Item)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into Item(ID, Name, Color, Quantity, Type, Price, SupplierID) values ('$Item->ID', '$Item->Name', '$Item->Color', '$Item->Quantity', '$Item->Type', '$Item->Price', '$Item->SupplierID')";
        mysqli_query($con,$reg);
        
    }


}  



?>