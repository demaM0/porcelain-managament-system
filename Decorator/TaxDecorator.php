<?php
include_once("DecoratorInvoice.php");
class Tax extends Decoratorinvoice
{
    protected $tax = 1.14;
    public function adjustprice(): float
    {
        return $this->tax * parent::adjustprice();
    }
}
?>