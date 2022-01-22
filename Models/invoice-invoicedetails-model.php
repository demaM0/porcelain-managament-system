<?php
require_once("SingleTon.php");
class  invoiceinvoicedetailsmodel
{
    public $Id;
    public $InvoiceId;
    public $InvoiceDetailsId;
    function __construct($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from `invoice-invoicedetails` where Id=$Id";
        $invoicedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedataset))
        {
          $this->Id=$row["Id"];
          $this->InvoiceId=$row["InvoiceId"];
          $this->InvoiceDetailsId=$row["InvoiceDetailsId"];
        }
    }
    public static function Invoice($Id)
    {
        $con =DbConnection::getInstance();
        if(!$con)
        {
          die('could not connect: ' . mysqli_error($con));
        }
        $sql="select * from `invoice-invoicedetails` where InvoiceId=$Id";
        $result=mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        $invoiceIdArray=array();
        if($num>0)
        {
          while($row=mysqli_fetch_array($result))
          {
            if($row["IsDeleted"]==0)
            {
              $invoiceloop=$row["InvoiceDetailsId"];
              array_push($invoiceIdArray,$invoiceloop);
            }
          }
        }
        return $invoiceIdArray;
    }
    public static function create($InvoiceId,$InvoiceDetailsId)
    {
      $con =DbConnection::getInstance();
      if(!$con)
      {
        die('could not connect: ' . mysqli_error($con));
      }
      $reg = "insert into  `invoice-invoicedetails`(InvoiceId,InvoiceDetailsId) values ($InvoiceId,$InvoiceDetailsId)";
      $test=mysqli_query($con,$reg);
    }
    
    
}
?>
