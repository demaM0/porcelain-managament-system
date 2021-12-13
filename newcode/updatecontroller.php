
<?php

	require_once('itemmodel.php');
	$id = $_POST['id'];
	$item = new Items($id);
	$item->Price = $_POST['price'];
	$item->Quantity = $_POST['quantity'];
	$item->update();


    
?>