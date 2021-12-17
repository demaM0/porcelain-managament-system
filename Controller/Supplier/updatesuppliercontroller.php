<?php
	require_once('suppliermodel.php');
	$Id = $_POST['id'];
	$supplier = new supplier($Id);
	$supplier->Name = $_POST['Name'];
	$supplier->Phone = $_POST['Phone'];
    $supplier->Email=$_POST['Email'];
	$supplier->update();

?>