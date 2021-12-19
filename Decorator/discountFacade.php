<?php

include_once("BaseAmount.php");
include_once("DecoratorInvoice.php");
include_once("DiscountDecorator.php");
include_once("CalculateInvoiceInterface.php");

class DiscountFacade
{
    protected $total;
    public function __construct($total,$discountamount)
    {
        $this->total = $total;
        $price = new BaseAMOUNT($this->total);
        $price = new Discount($price);
        $price->setdiscount($discountamount);
        $this->total = $price->adjustprice();
    }

    public function display()
    {
        return $this->total;
    }
}

?>
