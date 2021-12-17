<?php
require_once('../../Models/InvoiceDetails-model.php');
require_once('../../Models/SingleTon.php'); 
     $Id = $_POST['Id'];
    $Invoicedetails = new InvoiceDetails($Id);
    $Invoicedetails->delete();
?>