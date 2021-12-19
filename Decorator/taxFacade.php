<?php
include_once("BaseAmount.php");
include_once("DecoratorInvoice.php");
include_once("TaxDecorator.php");
include_once("CalculateInvoiceInterface.php");

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