<?php
require_once("Context.php");
require_once("StateInterface.php");
class InstallmentPaid extends State
{
    private $TransactionExistInstallmentNotPaid;
    public function transaction()
     {
        echo("State : Paid"."\n");
        
        $this->context->transitionTo(new Done());
     }
}




?>