<?php
require_once('../Models/SingleTon.php');
require_once('../Models/invoicepaymentmethod-model.php');
require_once('../Models/paymentmethodoptionsvalue-model.php');
require_once('../Models/invoice-model.php');
session_start();
$result = invoice::selectall();
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $invoiceIdwanted= $row["Id"];
    }
}
$paymentId = $_SESSION["CurrentpaymentId"];
invoicepaymentmethod::create($paymentId,$invoiceIdwanted);
$PMOIdarray = $_SESSION["CurrentPMOIdarray"];
$result = invoicepaymentmethod::selectall();
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $IMPIdwanted= $row["Id"];
    }
}
$option_values = $_POST["option_values"];
$keys = array_keys($option_values);
for($i=0;$i<count($option_values);$i++)
{
    paymentmethodoptionsvalue::create((int)key($option_values[$i]),current($option_values[$i]),$IMPIdwanted);
}

//insert all option values


?>