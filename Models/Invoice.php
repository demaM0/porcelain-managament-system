<?php
abstract class invoice
{
    protected $Id;
    protected $DateTimeStamp;
    protected $SalesManID;
    protected $CustomerID;
    protected $Total;
    function __construct($Id)
    {
        $con = mysqli_connect("localhost","root","","almasrya");
        if(!$con)
        {
          die('could not connect: ' . mysqli_error());
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
    public function upgradeInvoice();
}
?>
