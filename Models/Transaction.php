<?php
class Transaction
{
    protected $Id;
    protected $FullPrice;
    protected $DateOfTransaction;
    protected $SupplierID;
    protected $ManagerID;
    public function __construct()
    {

    }
    public function getID()
    {
        return $this->Id;
    }
    public function setFullPrice(int $FullPrice)
    {
        $this->FullPrice = $FullPrice;
    }
    public function getFullPrice()
    {
        return $this->FullPrice;
    }
    public function getDateOfTransaction()
    {
        return $this->DateOfTransaction;
    }
    public function getSupplierID()
    {
        return $this->SupplierID;
    }
    public function getManagerID()
    {
        return $this->ManagerID;
    }






























}
?>