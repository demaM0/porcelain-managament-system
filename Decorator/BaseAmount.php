<?php
include_once("CalculateInvoiceInterface.php");
include_once("\Models\Item.php");
class BaseAMOUNT implements UpgradeINVOICE
{
    protected $totalPrice;
    public function __construct($totalPrice)
    {
        $this->totalPrice = $totalPrice; 
    }
    public function adjustprice():float
    {
        return $this->totalPrice;
    }
}
?>