<?php
require_once("Context.php");
require_once("StateInterface.php");
require_once("FailedState.php");
require_once("TransactionDoesNotExist.php");
require_once("TransactionExistInstallmentNotPaid.php");
require_once("TransactionExistInstallmentPaid.php");
require_once("InstallmentExist.php");
require_once("InstallmentNotPaid.php");
require_once('../Models/transaction-model.php');
require_once('../Models/transaction-installment-model.php');
require_once('../Models/installment-model.php');                  
require_once('../Models/SingleTon.php');
$Id = $_POST['Id'];
$transaction=new transaction($Id);
$Tinstallment=transactioninstallment::Transaction($Id);
if($transaction->error!=-1)
{
    $context = new Context(new TransactionExist());
    $context->request();
    if(count($Tinstallment)>0)
    {
        
            for($i=0;$i<count($Tinstallment);$i++)
            {
                $context = new Context(new InstallmentExist());
                $context->request();
                $installment=new installment($Tinstallment[$i]);
                if($installment->IsPaid!=0)
                {
                    echo("InstallmentId:".$installment->Id."\n");
                    $context->request();
                    //echo("here"."\n");
                    
                }
                else
                {
                    echo("InstallmentId:".$installment->Id."\n");
                    $context = new Context(new InstallmentNotPaid());
                    $context->request();
                }
            }
        
    }
    else
    {
        echo("No Installment"."\n");
    }
}
else
{
    $context = new Context(new FailedState());
    $context->request();
}   



?>
