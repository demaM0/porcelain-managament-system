<?php
require_once('../../Models/address-model.php');
require_once('../../Models/SingleTon.php');  
     $Id = $_POST['Id'];
    $address = new address($Id);
    $address->delete();
?>