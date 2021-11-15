<?php
include_once("DecoratorInvoice.php");
class Discount extends Decoratorinvoice
{
    protected $discount;
    public function setdiscount($priceD)
    {
        $this->discount = $priceD;
    }
    public function operation(): float
    {
        return parent::adjustprice() - $this->discount;
    }
}

?>