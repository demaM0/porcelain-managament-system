
<?php
	require_once('../../Models/item-model.php');
	require_once('../../Models/SingleTon.php');
	$id = $_POST['id'];
	$item = new Items($id);
	$item->Price = $_POST['price'];
	$item->Quantity = $_POST['quantity'];
	$item->update();


    
?>