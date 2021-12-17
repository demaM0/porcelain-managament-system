<?php
	require_once('../../Models/customer-model.php');
	require_once('../../Models/SingleTon.php');
	$Name = $_POST['Name'];
	$Phone = $_POST['Phone'];
	$Email = $_POST['Email'];
	customer::create($Name,$Phone,$Email);

?>