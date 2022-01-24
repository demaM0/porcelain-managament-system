<?php
require_once("Context.php");
require_once("StateInterface.php");
class InstallmentExist extends State
{
    public function transaction()
    {
        echo("State : InstallmentExist"."\n");
        $this->context->transitionTo(new InstallmentPaid());
    }
}



?>