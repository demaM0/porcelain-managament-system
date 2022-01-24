<?php
require_once("Context.php");
require_once("StateInterface.php");
class InstallmentNotPaid extends State
{
    public function transaction()
    {
        echo("State : This Installment Is Not Paid"."\n");
        $this->context->transitionTo(new FailedState());
    }
}



?>