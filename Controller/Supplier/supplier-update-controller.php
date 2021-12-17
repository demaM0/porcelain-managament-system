<?php
	require_once('../../Models/supplier-model.php');
	$Id = $_POST['id'];
	$supplier = new supplier($Id);
	$supplier->Name = $_POST['Name'];
	$supplier->Phone = $_POST['Phone'];
    $supplier->Email=$_POST['Email'];
	$supplier->update();

?>