<?php
require_once("SingleTon.php");
class UpdateCustomer
{
    public function Update($Customer)
    {
        $con =DbConnection::getInstance(); 

        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        if($Customer->Name!=NULL)
        {
            $sql = "update customer SET Name=$Customer->Name Where ID=$Customer->ID";
        }
        if($Customer->Phone!=NULL)
        {
            $sql = "update customer SET Phone=$Customer->Phone Where ID=$Customer->ID";
        }
        if($Customer->Email!=NULL)
        {
            $sql = "update customer SET Email=$Customer->Email Where ID=$Customer->ID";
        }
     
    }
}

?>
