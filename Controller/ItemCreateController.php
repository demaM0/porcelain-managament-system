<?php
require_once("SingleTon.php");
require_once("\Views\CreateItemView\connectcreate.php");
class CreateItem
{


    public function __construct($name,$color,$quantity,$type,$price,$supplierid)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $reg = "insert into items(Name, Color, Quantity, Type, Price, SupplierID) values ('$name', '$color', $quantity, $type, $price, $supplierid)";
        mysqli_query($con,$reg);
        
    }


}  



?>