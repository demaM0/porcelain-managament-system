<?php
class InvoiceDetails
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
        return $this->id;
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
    public function getTotal(int $Total)
    {
        return $this->Total;  
    }
}
?>