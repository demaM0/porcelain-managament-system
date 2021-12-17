
<?php
require_once('suppliermodel.php');
	$id = $_POST['id'];
	$supplier = new supplier($id);
	$supplier->delete();
?>