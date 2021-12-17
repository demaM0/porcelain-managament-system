<?php
require_once("SingleTon.php");
class UpdateTransaction
{
    public function Update($Transaction)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($Transaction->FullPrice!=NULL)
        {
            $sql = "update transaction SET FullPrice=$Transaction->FullPrice Where Id=$Transaction->Id";
        }
        if($Transaction->DateOfTransaction!=NULL)
        {
            $sql = "update transaction SET DateOfTransaction=$Transaction->DateOfTransaction Where Id=$Transaction->Id";
        }
        if($Transaction->SupplierID!=NULL)
        {
            $sql = "update transaction SET SupplierID=$Transaction->SupplierID Where Id=$Transaction->Id";
        }
        if($Transaction->ManagerID!=NULL)
        {
            $sql = "update transaction SET ManagerID=$Transaction->ManagerID Where Id=$Transaction->Id";
        }
     
    }
}

?>
