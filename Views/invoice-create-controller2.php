<?php
	require_once('../Models/SingleTon.php');
	require_once('../Models/Invoice-model.php');
	
  	$CustomerId=$_POST['id'];
	$Total = $_POST['total'];
	
	Invoice::create($Total,$CustomerId);

?>