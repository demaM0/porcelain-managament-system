<?php
include_once("DecoratorInvoice.php");
class Discount extends Decoratorinvoice
{
    protected $discount;
    public function setdiscount($priceD)
    {
        $this->discount = $priceD/100;
    }
    public function adjustprice(): float
    {
        $Totalprice = parent::adjustprice();
        $subtract = (parent::adjustprice() * $this->discount);
        $Totalprice = $Totalprice - $subtract; 
        return $Totalprice;
    }
}

?>