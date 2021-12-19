
<?php
	require_once('../../Models/transaction-model.php');
	require_once('../../Models/SingleTon.php');
	$FullPrice = $_POST['fullprice'];
	$SupplierId = $_POST['supplierid'];
	$ManagerId = $_POST['managerid'];

	
	transaction::create($FullPrice,$SupplierId,$ManagerId);
	
?>