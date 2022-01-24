<?php
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/Invoice-model.php');
    require_once('../../Models/InvoiceDetails-model.php');
	require_once('../../Models/invoice-invoicedetails-model.php');
	require_once('../../Command/invoice-create-command.php');
	require_once('../../Command/receiver.php');
	require_once('../../Command/invoker.php');  
    session_start();
	$reciever = new Receiver();
    $createCommand = new createCommand($reciever);
	$invoker = new invoke($createCommand);
	$invoker->run();

	header("Location: ../../EAV/payementOptions.html", true);
        exit();
	//$reciever = new Receiver();
   // $createCommand = new createCommand($reciever);
	
	//$createCommand->execute();
?>