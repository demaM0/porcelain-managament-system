<?php
require_once("SingleTon.php");
class invoicedetails
{
    protected $Id;
    protected $ItemID;
    protected $InvoiceID;
    protected $Quantity;
    protected $Total;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from invoicedetails where Id=$Id";
        $invoicedetailsdataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedetailsdataset))
        {
          $this->Id=$row["Id"];
          $this->ItemID=$row["ItemID"];
          $this->InvoiceID=$row["InvoiceID"];
          $this->Quantity=$row["Quantity"];
          $this->Total=$row["Total"];
        }
    }
    public function getId()
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
    public function getTotal()
    {
        return $this->Total;  
    }
}
?>