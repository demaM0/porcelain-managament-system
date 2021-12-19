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
        $sql="select * from invoice-invoicedetails where Id=$Id";
        $invoicedataset = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($invoicedataset))
        {
          $this->Id=$row["Id"];
          $this->InvoiceId=$row["InvoiceId"];
          $this->InvoiceDetailsId=$row["InvoiceDetailsId"];
        }
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
