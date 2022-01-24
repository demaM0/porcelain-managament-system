<?php
session_start(); 
require_once('../Models/SingleTon.php');
require_once('EAVpaymentsorter.php');
header('Content-Type: application/json');
$results = array();
$options=new Optionretrieval();
$results['result'] = $options->Retrieveoptions( $_GET['paymentId']);
$_SESSION["CurrentpaymentId"]=$_GET['paymentId'];
$_SESSION["CurrentPMOIdarray"] = $options->Retrieveoptions( $_GET['paymentId']);
$json=json_encode($results);
echo($json);






?>