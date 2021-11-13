<?php
include_once("Invoice.php");

class tax extends invoice{
    $ref;
    public tax($ref )
    {
        $this->ref=$ref;
    }
    public function upgradeInvoice()
    {
        return 20 + $ref.upgradeInvoice(); 
        //tester values
    }
}
?>