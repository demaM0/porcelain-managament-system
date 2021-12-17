
<?php

	require_once('itemmodel.php');
	$id = $_POST['id'];
	$itemdelete = new Items($id);
	$itemdelete->delete();

?>