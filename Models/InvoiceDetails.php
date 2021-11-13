<?php
class invoicedetails
{
    protected $Id;
    protected $ItemID;
    protected $InvoiceID;
    protected $Quantity;
    protected $Total;
    public function __construct()
    {

    }
    public function getID()
    {
        return $this->Id;
    }
    public function getItemID()
    {
        return $this->ItemID;
    }
    public function getInvoiceID()
    {
        return $this->InvoiceID;
    }
    public function setQuantity(int $Quantity)
    {
        $this->Quantity = $Quantity;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }
    public function Calculate()
    {       
    }
    public function getTotal()
    {
        return $this->Total;  
    }
}
?>