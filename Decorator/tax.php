<?php
include_once("Invoice.php");

class tax extends invoice{
    protected $ref;
    protected $tax;
    public function __construct(invoice $ref)
    {
        $this->ref=$ref;
    }
    public function tax($tax )
    {
        $this->tax=$tax;
    }
    public function upgradeInvoice()
    {
        return  $this->tax * $this->ref.upgradeInvoice(); 
        //tester values
    }
}
?>