<?php
include_once("CalculateInvoiceInterface.php");
class Decoratorinvoice implements UpgradeINVOICE
{
    
    protected $UpgradeINVOICE;

    public function __construct(UpgradeINVOICE $UpgradeINVOICE)
    {
        $this->UpgradeINVOICE = $UpgradeINVOICE;
    }

    
    public function adjustprice(): float
    {
        return $this->UpgradeINVOICE->adjustprice();
    }
}
?>