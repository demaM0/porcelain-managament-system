<?php
require_once("SingleTon.php");
abstract class invoice
{
    protected $Id;
    protected $DateTimeStamp;
    protected $SalesManID;
    protected $CustomerID;
    protected $Total;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from invoice where Id=$Id";
        $invoicedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedataset))
        {
          $this->Id=$row["Id"];
          $this->DateTimeStamp=$row["DateTimeStamp"];
          $this->SalesManID=$row["SalesManID"];
          $this->CustomerID=$row["CustomerID"];
          $this->Total=$row["Total"];
        }
    }
    public function getID()
    {
        return $this->Id;
    }
    public function getSalesManID()
    {
        return $this->SalesManID;
    }
    public function getCustomerID()
    {
        return $this->CustomerID;
    }
    public function getDateTimeStamp()
    {
        return $this->DateTimeStamp;     
    }
    public function getTotal(int $Total)
    {
        return $this->Total;  
    }
    abstract public function upgradeInvoice();
}
?>
