<?php
require_once("SingleTon.php");
class CreateItemType
{

    public function CreateItem($ItemType)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into items(Category, Shape) values ('$ItemType->Category', '$ItemType->Shape')";
        mysqli_query($con,$reg);
        
    }


}  



?>