<?php
require_once('../../Models/SingleTon.php');
require_once('../../Models/translation-model.php');
header('Content-Type: application/json');
$results = array();
$translate=new Translate();
$results['result'] = $translate->translate( $_GET['lang_code'],$_GET['trans_key'] );

$json=json_encode($results);
echo($json);






?>