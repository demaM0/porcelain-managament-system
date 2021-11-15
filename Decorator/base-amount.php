<?php
include_once("Invoice.php");
class baseamount extends invoice{
    protected $ref;
    public function __construct($item)
    {
        $this-> ref = $item;
    }
    public function upgradeInvoice()
    {
        return $this->ref->Price;
        //tester values
    }
}
?>