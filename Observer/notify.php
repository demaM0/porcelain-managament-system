<?php
    include_once('\Models\User.php');
    include_once('\Controller\manager.php');
    include_once('subjectinterface.php');
    include_once('observerinterface.php');
    include_once('\Controller\salesman.php');
    include_once('\Controller\customercontroller.php');
    include_once('\Controller\suppliercontroller.php');   
    include_once('\Controller\SingleTon.php');
    $messagebox = $_POST['messagebox'];
    $manager = new manager();
	$salesman = new salesman();
    $customer = new customernotify($manager,$messagebox);
    $customer2 = new customernotify($manager,$messagebox);
	$supplier = new supplier($manager);
	$supplier = new supplier($salesman);
    $manager->notifyOBS();
	$salesman->notifyOBS();
    
?>