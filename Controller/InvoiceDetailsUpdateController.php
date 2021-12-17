<?php
require_once('../Models/InvoiceDetails.php');   
require_once('../Models/SingleTon.php');
$id = $_POST['Id'];
$invoiceDetails = new InvoiceDetails($id);
$invoiceDetails->ItemId = $_POST['ItemId'];
$invoiceDetails->InvoiceId = $_POST['InvoiceId'];
$invoiceDetails->Quantity = $_POST['Quantity'];
$item = new items($invoiceDetails->ItemId);
$Total = $Quantity * $item->Price;
$invoiceDetails->Total = $Total;   
$invoiceDetails->update();


?>