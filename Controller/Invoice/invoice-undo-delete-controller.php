<?php
	require_once('../../Models/SingleTon.php');
	require_once('../../Models/Invoice-model.php');
    require_once('../../Models/InvoiceDetails-model.php');
	require_once('../../Models/invoice-invoicedetails-model.php');
	require_once('../../Command/invoice-delete-command.php');
	require_once('../../Command/receiver.php');
	require_once('../../Command/invoker.php');

    session_start();
	$con =DbConnection::getInstance();
    if(!$con)
    {
        die('could not connect: ' . mysqli_error($con));
    }
    $reciever = new Receiver();
    $deleteCommand = new undoDeleteCommand($reciever);
	$invoker = new invoke($deleteCommand);
	$invoker->run();
?>