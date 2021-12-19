<?php
include_once("BaseAmount");
include_once("DecoratorInvoice");
include_once("TaxDecorator");
include_once("CalculateInvoiceInterface");

class TaxFacade
{
    protected $total;
    public function __construct($total)
    {
        $this->total = $total;
        $price = new BaseAMOUNT($this->total);
        $price = new Tax($price);
        $this-> total = $price->adjustprice();
    }

    public function display()
    {
        return $this->total;
    }
}

?>