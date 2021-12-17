<?php

require_once('../../Models/address-model.php');
require_once('../../Models/SingleTon.php');
	$Id = $_POST['Id'];
    
	$address = new address($Id);
	$address->City = $_POST['City'];
	$address->Building = $_POST['Building'];
    $address->ZipCode=$_POST['ZipCode'];
	$address->update();


    
?>