<?php
require_once("SingleTon.php");
class CreateItemType
{

    public function __construct($Category,$Shape)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into itemtype(Category, Shape) values ('$Category', '$Shape->Shape')";
        mysqli_query($con,$reg);
        
    }


}  



?>