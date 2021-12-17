<?php
require_once('../../Models/installment-model.php');
require_once('../../Models/SingleTon.php');  
     $Id = $_POST['Id'];
    $installment = new installment($Id);
    $installment->delete();
?>