<?php
    include_once('\Models\User.php');
    include_once('manager.php');
    include_once('\Observer\subjectinterface.php');
    include_once('\Observer\notify.php');
    include_once('\Observer\observerinterface.php');
    include_once('salesman.php');
    include_once('suppliercontroller.php');
    class customernotify implements Observer{
        protected $customer;
        protected $msg;
    
        public function __construct(Subject $W,$messagebox)
        {
            $W->addOBS($this);
            $this->msg = $messagebox;
        }
        public function update($x){
            if($x==1)
            {
                echo("Manager sent msg:");
                echo "<h2>" . $this->msg . "</h2>";
            }
            if($x==2)
            {
                echo("Sales man is talking to the customerlol");
                echo "<h2>" . $this->msg . "</h2>";
            }
    
        }
    }
    ?>
    