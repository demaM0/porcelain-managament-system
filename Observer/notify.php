<?php
    include_once('\Models\User.php');
    include_once('\Controller\manager.php');
    include_once('subjectinterface.php');
    include_once('observerinterface.php');
    include_once('\Controller\salesman.php');
    include_once('\Controller\customercontroller.php');
    include_once('\Controller\suppliercontroller.php');
    
    
    $manager = new manager();
    $salesman = new salesman();
    $supplier = new supplier($manager);
    $supplier = new supplier($salesman);
    $customer = new customer($manager);
    $customer = new customer($salesman);
    $manager->notifyOBS();
    $salesman->notifyOBS();
    
?>