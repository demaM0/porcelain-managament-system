<?php
require_once('../Models/SingleTon.php');
require_once('../Models/installment-model.php');
require_once('../Models/transaction-model.php');
require_once('../Models/transaction-installment-model.php');
class InstallmentHandleController  {
    public $returner;
    function __construct($Id)
    {  
       $Transaction = new transaction($Id);
       $result2 = 0;
       $result2 = transactioninstallment::SelectAllWithId($Id);
       $result=array();
       if($Transaction->error==-1) 
       {
           echo '<script>alert("No such transaction")</script>';
           echo '<script>window.location="../Views/Transaction-id-input.html"</script>';
       }
        if($result2==0)
        {
            echo '<script>alert("No installments to be paid")</script>';
            echo '<script>window.location="../Views/Transaction-id-input.html"</script>';
        }

       if(count($result2)>0)
       {

           for($i=0;$i<count($result2);$i++)
           {
            
                $Installment = new installment($result2[$i]);

                array_push($result,$Installment);
               

           }
        }
       $this->returner = $result;       
    }
}

?>