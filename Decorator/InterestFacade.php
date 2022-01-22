<?php

include_once("BaseAmount.php");
include_once("DecoratorInvoice.php");
include_once("InterestDecorator.php");
include_once("CalculateInvoiceInterface.php");

class InterestFacade
{
    protected $total;
    public function __construct($total,$interestamount)
    {
        $this->total = $total;
        $price = new BaseAMOUNT($this->total);
        $price = new Interest($price);
        $price->setinterest($interestamount);
        $this->total = $price->adjustprice();
    }

    public function display()
    {
        return $this->total;
    }
}

?>
