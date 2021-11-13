<?php
class transaction
{
    protected $Id;
    protected $FullPrice;
    protected $DateOfTransaction;
    protected $SupplierID;
    protected $ManagerID;
    public function __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
        }
        $sql="select * from transaction where Id=$Id";
        $Transactiondataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($Transactiondataset))
        {
          $this->Id=$row["Id"];
          $this->FullPrice=$row["FullPrice"];
          $this->DateOfTransaction=$row["DateOfTransaction"];
          $this->SupplierID=$row["SupplierID"];
          $this->ManagerID=$row["ManagerID"];
        }
    }
    public function getId()
    {
        return $this->Id;
    }
    public function setFullPrice($FullPrice)
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

    public function setManagerID($ManagerID)
    {
        $this->ManagerID = $ManagerID;
    }

    public function setSupplierID($SupplierID)
    {
        $this->SupplierID = $SupplierID;
    }


}
?>