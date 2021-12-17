
<?php
	require_once('transactionmodel.php');
	require_once('../Models/SingleTon.php');
	$FullPrice = $_POST['fullprice'];
	$SupplierId = $_POST['supplierid'];
	$ManagerId = $_POST['managerid'];
	transaction::createtransaction($FullPrice,$SupplierId,$ManagerId);
?>