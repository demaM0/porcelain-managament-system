
<?php
	require_once('suppliermodel.php');
	require_once('Models\SingleTon.php');
	$Name = $_POST['name'];
	$Phone = $_POST['phone'];
	$Email = $_POST['email'];
	supplier::createsupplier($Name,$Phone,$Email);
	


    
?>