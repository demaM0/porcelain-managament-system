
<?php
	require_once('../../Models/item-model.php');
	require_once('../../Models/SingleTon.php');
	$Name = $_POST['name'];
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	$Quantity = $_POST['quantity'];
	$SupplierId = $_POST['SupplierId'];
	Items::create($Name,$Color,$Quantity,$Price,$SupplierId);
	Items::itemsupplier($SupplierId);
	


    
?>