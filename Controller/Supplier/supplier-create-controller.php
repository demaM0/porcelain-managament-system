
<?php
	require_once('../../Models/supplier-model.php');
	require_once('../../Models/SingleTon.php');
	$Name = $_POST['name'];
	$Phone = $_POST['phone'];
	$Email = $_POST['email'];
	supplier::create($Name,$Phone,$Email);
	


    
?>