<?php
require_once('../Models/SingleTon.php');
require_once('../Models/item-model.php');
class ShoppingCartController  {
    public $returner;
    function __construct()
    {  
       $result = Items::selectall();
       $this->returner = $result;       
    }
}

?>