<?php

abstract class installment {

    protected $id;
    protected $Quantity;
    protected $InstallmentDate;
    protected $TransactionID;
    function __construct($id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from installment where id=$id";
        $installmentdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($installmentdataset))
        {
          $this->id=$row["id"];
          $this->Quantity=$row["Quantity"];
          $this->InstallmentDate=$row["InstallmentDate"];
          $this->TransactionID=$row["TransactionID"];
        }
    }
    abstract public function setid(string $id)
    {
        $this->id = $id;
    }
    abstract public function setquantity(string $Quantity)
    {
        $this->Quantity = $Quantity;
    }
    abstract public function setinstallmentdate(string $InstallmentDate)
    {
        $this->InstallmentDate = $InstallmentDate;
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
        return $this->InstallmentDate;
    }
    abstract public function gettransactionid()
    {
        return $this->TransactionID;
    }
  }
?>