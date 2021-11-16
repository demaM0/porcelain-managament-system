
<?php
	include_once('ItemCreateController.php');
	include_once("\Models\SingleTon.php");
        $name = $_POST['name'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$type = $_POST['type'];
	$supplierid = $_POST['supplierid'];
	$item = new CreateItem($name,$color,$price,$quantity,$type,$supplierid);


    
?>