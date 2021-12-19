<?php

include_once("BaseAmount");
include_once("DecoratorInvoice");
include_once("DiscountDecorator");
include_once("CalculateInvoiceInterface");

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
