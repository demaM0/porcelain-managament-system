<?php
    include_once('\Models\User.php');
    include_once('customercontroller.php');
    include_once('\Observer\subjectinterface.php');
    include_once('\Observer\notify.php');
    include_once('\Observer\observerinterface.php');
    include_once('salesman.php');
    include_once('suppliercontroller.php');
class manager extends user implements Subject{
    protected $observers = [];
    
    public function __construct()
    {
        $this->UserType = 1;
    }
    public function addOBS(Observer $observer){

        $key = spl_object_hash($observer);
        $this->observers[$key] = $observer;
        return $this;
    }
    public function removeOBS(Observer $observer){

        $key = spl_object_hash($observer);
        unset($this->observers[$key]);
    }
    public function notifyOBS(){

            foreach ($this->observers as $observer) 
            {
                $observer->update($this->UserType);
            }
    }
}
?>