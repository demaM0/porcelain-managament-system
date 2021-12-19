<?php
	require_once('../../Models/address-model.php');
	require_once('../../Models/SingleTon.php');
	$City = $_POST['City'];
	$Building = $_POST['Building'];
	$ZipCode = $_POST['ZipCode'];
	$SupplierId=$_POST['SupplierId'];
	address::create($City,$Building,$ZipCode);
	address::supplieraddress($SupplierId);
?>