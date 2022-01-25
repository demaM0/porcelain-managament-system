<?php
	require_once('../../Models/installment-model.php');
	require_once('../../Models/SingleTon.php');
	$Quantity = $_POST['Quantity'];
	$TransactionId = $_POST['TransactionId'];
		installment::create($Quantity,$TransactionId);
	
	
?>