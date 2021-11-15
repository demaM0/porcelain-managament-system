<?php
include_once("DecoratorInvoice.php");
class Tax extends Decoratorinvoice
{
    protected $tax;
    public function settax($price)
    {
        $this->tax = $price;
    }
    public function adjustprice(): float
    {
        return $this->tax + parent::adjustprice();
    }
}
?>