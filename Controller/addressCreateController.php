<?php
	require_once('../Models/address-model.php');
	require_once('../Models/SingleTon.php');
	$City = $_POST['City'];
	$Building = $_POST['Building'];
	$ZipCode = $_POST['ZipCode'];
	address::createaddress($City,$Building,$ZipCode);

?>