
<?php

require_once('transactionmodel.php');
$id = $_POST['id'];
$transactiondelete = new transaction($id);
$transactiondelete->delete();

?>