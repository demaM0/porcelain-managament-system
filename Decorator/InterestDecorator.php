<?php
include_once("DecoratorInvoice.php");
class Interest extends Decoratorinvoice
{
    protected $interest;
    public function setinterest($priceD)
    {
        $this->interest = $priceD/100;
    }
    public function adjustprice(): float
    {
        $Totalprice = parent::adjustprice();
        $addition = (parent::adjustprice() * $this->interest);
        $Totalprice = $Totalprice + $addition; 
        return $Totalprice;
    }
}

?>