<?php
include_once("CalculateInvoiceInterface.php");
include_once("\Models\Item.php");
class BaseAMOUNT implements UpgradeINVOICE
{
    protected $item;
    public function __construct($item)
    {
        $this->item = $item; 
    }
    public function adjustprice():float
    {
        return $this->item->price;
    }
}
?>