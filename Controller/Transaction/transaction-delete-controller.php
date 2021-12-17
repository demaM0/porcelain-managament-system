
<?php

require_once('../../Models/transaction-model.php');
$id = $_POST['id'];
$transaction = new transaction($id);
$transaction->delete();

?>