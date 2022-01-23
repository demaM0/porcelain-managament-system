<?php
require_once("transaction-model.php");
abstract class State
{
    
    protected $context;

    public function setContext(transaction $context)
    {
        $this->context = $context;
    }

    abstract public function transactionDoesNotExist(): void;
    abstract public function transactionExistNoInstallment(): void;
    abstract public function transactionExistInstallmentNotPaid(): void;
    abstract public function transactionExistInstallmentPaid(): void;
    
}

?>