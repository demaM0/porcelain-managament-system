<?php
	require_once('../../Models/installment-model.php');
	require_once('../../Models/SingleTon.php');
	$Quantity = $_POST['Quantity'];
	$TransactionId = $_POST['TransactionId'];
	
	$con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
	$s = "select * from transaction where Id  = '$TransactionId' ";
	$result = mysqli_query($con,$s);
	$num = mysqli_num_rows($result);

	if($num==1){
		installment::create($Quantity);
	
		installment::assigntransaction($TransactionId);
	}
	else{
	echo"this transaction doesnt exist";
	}  
	
?>