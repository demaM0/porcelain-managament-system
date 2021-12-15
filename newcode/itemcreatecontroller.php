
<?php
	require_once('itemmodel.php');
	require_once('../Models/SingleTon.php');
	$Name = $_POST['name'];
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	$Quantity = $_POST['quantity'];
	Items::createitem($Name,$Color,$Quantity,$Price);
	


    
?>