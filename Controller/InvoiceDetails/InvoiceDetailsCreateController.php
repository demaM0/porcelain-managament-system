<?php
require_once('../Models/InvoiceDetails.php');
require_once('../Models/itemmodel.php');
	require_once('../Models/SingleTon.php');
	$ItemId = $_POST['ItemId'];
	$InvoiceId = $_POST['InvoiceId'];
	$Quantity = $_POST['Quantity'];
	$item = new items($ItemId);
  	$Total = $Quantity * $item->Price;
	InvoiceDetails::create($ItemId, $InvoiceId, $Quantity,$Total);
?>