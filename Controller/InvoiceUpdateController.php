<?php

    require_once('../Models/Invoice-model.php');   
	require_once('../Models/SingleTon.php');
	$Id = $_POST['Id'];
	$Invoice = new Invoice($Id);
    $Invoice->Total=$_POST['Total'];
    $Invoice->CustomerId=$_POST['CustomerId'];
	$Invoice->update();