<?php
require_once("SingleTon.php");
class UpdateAddress
{
    public function Update($Address)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($Address->City!=NULL)
        {
            $sql = "update address SET City=$Address->City Where ID=$Address->ID";
        }
        if($Address->Building!=NULL)
        {
            $sql = "update address SET Building=$Address->Building Where ID=$Address->ID";
        }
        if($Address->Email!=NULL)
        {
            $sql = "update address SET zipCode=$Address->zipCode Where ID=$Address->ID";
        }
        if($Address->Password!=NULL)
        {
            $sql = "update address SET SupplierID=$Address->SupplierID Where ID=$Address->ID";
        }
     
    }
}

?>
