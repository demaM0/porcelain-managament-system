<?php

abstract class customer {

    protected $id;
    protected $Quantity;
    protected $InstalmmentDate;
    protected $TransactionID;
    public function __construct()
    {

    }
    abstract public function setid(string $id)
    {
        $this->id = $id;
    }
    abstract public function setquantity(string $Quantity)
    {
        $this->Quantity = $Quantity;
    }
    abstract public function setinstallmentdate(string $InstalmmentDate)
    {
        $this->InstalmmentDate = $InstalmmentDate;
    }
    abstract public function settransactionid(string $TransactionID)
    {
        $this->TransactionID = $TransactionID;
    }

    abstract public function getid()
    {
        return $this->id;
    }
    abstract public function getquantity()
    {
        return $this->Quantity;
    }
    abstract public function getinstallmentdate()
    {
        return $this->InstalmmentDate;
    }
    abstract public function gettransactionid()
    {
        return $this->TransactionID;
    }
  }
?>