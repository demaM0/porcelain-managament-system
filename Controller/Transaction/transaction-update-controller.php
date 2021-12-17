
<?php

require_once('../../Models/transaction-model.php');
$id = $_POST['id'];
$transaction = new transaction($id);
$transaction->FullPrice = $_POST['fullprice'];
$transaction->SupplierId = $_POST['supplierid'];
$transaction->ManagerId = $_POST['managerid'];
$transaction->update();



?>