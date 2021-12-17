
<?php
require_once('../../Models/supplier-model.php');
	$id = $_POST['id'];
	$supplier = new supplier($id);
	$supplier->delete();
?>