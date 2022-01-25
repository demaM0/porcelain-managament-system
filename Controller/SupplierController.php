<?php
require_once('../../Models/supplier-model.php');
class SupplierController  {
    public $returner;
    function __construct()
    {  
       $result = supplier::selectall();
       $this->returner = $result;       
    }
}

?>