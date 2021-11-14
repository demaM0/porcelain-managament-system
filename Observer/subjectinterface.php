<?php
    include_once('\Models\User.php');
    include_once('\Controller\manager.php');
    include_once('observerinterface.php');
    include_once('notify.php');
    include_once('\Controller\salesman.php');
    include_once('\Controller\customercontroller.php');
    include_once('\Controller\supplliercontroller.php');
interface Subject{
    public function addOBS(Observer $observer);
    public function removeOBS(Observer $observer);
    public function notifyOBS();
}
?>