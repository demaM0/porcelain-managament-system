<?php
class invoice
{
    protected $Id;
    protected $DateTimeStamp;
    protected $SalesManID;
    protected $CustomerID;
    protected $Total;
    public function __construct()
    {

    }
    public function getID()
    {
        return $this->Id;
    }
    public function getSalesManID()
    {
        return $this->itemQuantity;
    }
    public function getCustomerID()
    {
        return $this->itemQuantity;
    }
    public function getDateTimeStamp()
    {
        return $this->DateTimeStamp;     
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
