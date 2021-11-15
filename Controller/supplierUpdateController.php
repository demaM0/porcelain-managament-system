<?php
require_once("SingleTon.php");
class UpdateSupplier
{
    public function Update($Supplier)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($Supplier->Name!=NULL)
        {
            $sql = "update supplier SET Name=$Supplier->Name Where ID=$Supplier->ID";
        }
        if($Supplier->Phone!=NULL)
        {
            $sql = "update supplier SET Phone=$Supplier->Phone Where ID=$Supplier->ID";
        }
        if($Supplier->Email!=NULL)
        {
            $sql = "update supplier SET Email=$Supplier->Email Where ID=$Supplier->ID";
        }
     
    }
}

?>
