<?php
require_once("SingleTon.php");
class UpdateItemType
{
    public function Update($ItemType)
    {
        $con =DbConnection::getInstance(); 
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }

        if($ItemType->Category!=NULL)
        {
            $sql = "update items SET Category=$ItemType->Category Where ID=$ItemType->ID";
        }
        if($ItemType->Shape!=NULL)
        {
            $sql = "update items SET Shape=$ItemType->Shape Where ID=$ItemType->ID";
        }
       
        mysqli_query($con,$sql);
    }
}

?>
