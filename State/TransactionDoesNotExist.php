<?php
require_once("Context.php");
require_once("StateInterface.php");

class TransactionExist extends State
{
    private $TransactionDoesNotExist;
    public function transaction()
    {
        echo("State: TransactionExist"."\n");
        $this->context->transitionTo(new InstallmentExist());
    }
}




?>