<?php
require_once("SingleTon.php");
class UpdateItem
{
    public function Update($Item)
    {
        $con =DbConnection::getInstance(); 
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        if($Item->Name!=NULL)
        {
            $sql = "update items SET Name=$Item->Name Where ID=$Item->ID";
        }
        if($Item->Color!=NULL)
        {
            $sql = "update items SET Color=$Item->Color Where ID=$Item->ID";
        }
        if($Item->Quantity!=NULL)
        {
            $sql = "update items SET Quantity=$Item->Quantity Where ID=$Item->ID";
        }
        if($Item->Type!=NULL)
        {
            $sql = "update items SET Type=$Item->Type Where ID=$Item->ID";
        }
        if($Item->Price!=NULL)
        {
            $sql = "update items SET Price=$Item->Price Where ID=$Item->ID";
        }
        if($Item->SupplierID!=NULL)
        {
            $sql = "update items SET SupplierID=$Item->SupplierID Where ID=$Item->ID";
        }
        mysqli_query($con,$sql);
    }
}

?>
