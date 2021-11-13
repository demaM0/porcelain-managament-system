<?php
include_once("Invoice.php");

class discount extends invoice{
     $ref;
    public discount($ref )
    {
        $this->ref=$ref;
    }
    public function upgradeInvoice()
    {
        return 30 + $ref.upgradeInvoice(); 
        //tester values
    }
}
?>