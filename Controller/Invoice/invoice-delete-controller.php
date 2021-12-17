<?php
require_once('../../Models/invoice-model.php');
require_once('../../Models/SingleTon.php');  
     $Id = $_POST['Id'];
    $Invoice = new invoice($Id);
    $Invoice->delete();
?>