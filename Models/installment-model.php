<?php

 class installment {

    protected $Id;
    protected $Quantity;
    protected $InstallmentDate;
    protected $TransactionID;
    function __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from installment where Id=$Id";
        $installmentdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($installmentdataset))
        {
          $this->Id=$row["Id"];
          $this->Quantity=$row["Quantity"];
          $this->InstallmentDate=$row["InstallmentDate"];
          $this->TransactionID=$row["TransactionID"];
        }
    }
     public function setTransactionID( $TransactionID)
    {
        $this->TransactionID = $TransactionID;
    }
     public function setQuantity( $Quantity)
    {
        $this->Quantity = $Quantity;
    }
     public function setInstallmentDate( $InstallmentDate)
    {
        $this->InstallmentDate = $InstallmentDate;
    }

     public function getId()
    {
        return $this->id;
    }
     public function getQuantity()
    {
        return $this->Quantity;
    }
     public function getInstallmentDate()
    {
        return $this->InstallmentDate;
    }
     public function getTransactionID()
    {
        return $this->TransactionID;
    }
  }
?>