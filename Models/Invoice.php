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
        return $this->SalesManId;
    }
    public function getCustomerID()
    {
        return $this->CustomerID;
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
