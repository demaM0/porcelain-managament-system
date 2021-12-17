<?php
	require_once('../../Models/Invoice-model.php');
	require_once('../../Models/SingleTon.php');
	$Total = $_POST['Total'];
  $CustomerId=$_POST['CustomerId'];
	
	Invoice::create($Total,$CustomerId);

?>