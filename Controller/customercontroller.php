<?php
    include_once('\Models\User.php');
    include_once('manager.php');
    include_once('\Observer\subjectinterface.php');
    include_once('\Observer\notify.php');
    include_once('\Observer\observerinterface.php');
    include_once('salesman.php');
    include_once('suppliercontroller.php');
class customer implements Observer{
    protected $ID;
    protected $Name;
    protected $Phone;
    protected $Email;

    public function __construct(Subject $W)
    {
        $W->addOBS($this);

    }
    public function update($x){
        if($x==1)
        {
            echo("Manager is talking to the customer");
        }
        if($x==2)
        {
            echo("Sales man is talking to the customer");
        }

    }
}
?>
