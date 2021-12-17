
<?php
	require_once('../../Models/item-model.php');
	require_once('../../Models/SingleTon.php');
	$id = $_POST['id'];
	$itemdelete = new Items($id);
	$itemdelete->delete();

?>